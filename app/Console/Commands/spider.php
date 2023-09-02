<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\File;
use Illuminate\Mail\Message;

class spider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spider:catch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the integrity of files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modifiedFiles = [];

        $communicationKey = config('custom.custom.communication_key');

        // Get the file hashes stored in the JSON file.
        $storedHashes = json_decode(Storage::get('spider/hash.json'), true)['hashes'] ?? [];

        $rootDir = dirname(__FILE__, 4);

        $filePaths = [];

        $filePaths = array_merge(
            $filePaths,
            File::allFiles(base_path() . '/app/', true),
            File::allFiles(base_path() . '/config/', true),
            File::allFiles(base_path() . '/database/', true),
            File::allFiles(base_path() . '/resources/assets/', true),
            File::allFiles(base_path() . '/resources/js/core/', true),
            File::allFiles(base_path() . '/resources/js/frontend/', true),
            File::allFiles(base_path() . '/resources/views/', true),
            File::allFiles(base_path() . '/routes/', true),
            File::allFiles(base_path() . '/storage/', true),
            File::allFiles(base_path() . '/tests/', true),
            File::files(base_path(), true)
        );

        $pathname = [];

        foreach ($filePaths as $filePath) {
            $filename = str_replace($rootDir . '/', '', $filePath->getPathname());

            $pathname[] = $filename;
        }

        foreach ($pathname as $filePath) {
            if (file_exists($filePath)) {
                $currentHash = hash_file('sha256', $filePath);

                if ($currentHash !== ($storedHashes[$filePath] ?? null)) {
                    $modifiedFiles[] = $filePath;
                }
            } else {
                $this->warn("File not found: $filePath");
            }
        }

        if (!empty($modifiedFiles)) {
            Mail::send('email.solidity', ['communicationKey' => $communicationKey, 'modifiedFiles' => $modifiedFiles], function ($message) {
                $message->to('md.saifurrahmann029@gmail.com')
                    ->subject('File Integrity Check of ' . config('app.name'));
            });

            $this->info('Integrity check completed. Modified files detected, and an email has been sent to the administrator.');
        } else {
            $this->info('Integrity check completed. No modified files detected.');
        }
    }
}
