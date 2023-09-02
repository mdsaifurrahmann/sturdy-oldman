<?php

namespace App\Console\Commands\spider;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class jumble extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spider:jumble';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and store hashes for monitored files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filePaths = [];

        $rootDir = dirname(__FILE__, 5);

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

            // $this->info($filename);

            $pathname[] = $filename;
        }

        $fileHashes = [];

        foreach ($pathname as $filePath) {
            $fileHashes[$filePath] = hash_file('sha256', $filePath);
        }

        // Load the existing JSON file
        $fileHashesJson = json_decode(Storage::get('spider/hashes.json'), true);

        // Update the JSON data with the new file hashes
        $fileHashesJson['hashes'] = $fileHashes;

        // Save the updated JSON back to the file
        Storage::put('spider/hash.json', json_encode($fileHashesJson, JSON_PRETTY_PRINT));

        $this->info('File hashes generated and stored.');
    }
}
