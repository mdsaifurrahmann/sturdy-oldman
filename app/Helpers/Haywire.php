<?php // Code within app\Helpers\Helper.php

namespace App\Haywire;

use Config;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class Haywire
{
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    public function wire()
    {
        $interface = config('custom.custom.interface');

        $modifiedFiles = '';

        $wireZone = request()->getHost();

        $client = new Client();

        $serverHost = 'v1.codebumble.net';

        $pingCommand = sprintf('ping -c 1 %s', escapeshellarg($serverHost));
        $pingResult = shell_exec($pingCommand);

        if (strpos($pingResult, '1 packets received') !== false) {
            try {
                $response = $client->post('https://v1.codebumble.net/v1/license/validate', [
                    'form_params' => [
                        'wireclue' => $interface,
                        'wirezone' => $wireZone,
                    ],
                ]);
                $getResponse = json_decode($response->getBody(), true);

                if ($getResponse['status'] != 'valid') {

                    Mail::send('email.solidity', ['interface' => $interface, 'modifiedFiles' => ''], function ($message) {
                        $message->to('md.saifurrahmann029@gmail.com')
                            ->subject('Indispose Detected on app ' . config('app.name'));
                    });
                    return $getResponse['status'];
                }
            } catch (\Exception $exception) {
                $response = $exception->getResponse();
                $statusCode = $response->getStatusCode();

                if ($statusCode === 404) {
                    Mail::send('email.solidity', ['interface' => $interface, 'modifiedFiles' => ''], function ($message) {
                        $message->to('md.saifurrahmann029@gmail.com')
                            ->subject('Ghost Detected on app ' . config('app.name'));
                    });

                    return 'ghost';
                } else {
                    // Handle other ClientException scenarios
                    return $response->getBody();
                }
            }
        }
    }
}
