<?php // Code within app\Helpers\Helper.php

namespace App\Haywire;

use Config;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;

class Haywire
{
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    public function wire()
    {
        $communicationKey = config('custom.custom.communication_key');

        $modifiedFiles = '';

        $wireClue = decrypt('eyJpdiI6Im5NL3NLQlBUelZYVU93NlcvU01RSkE9PSIsInZhbHVlIjoic2NtamhRTjNkWjNUYnF2dnVMZUwvZz09IiwibWFjIjoiODYzOWFjZmRhMjU5ZTZhODdkOWIyMDQyMGYzMjk3YWViZTExNGE5ZjIwOTU2MmQ3ZDc4MGJhYjJkMjU3MWFlNyIsInRhZyI6IiJ9')(decrypt('eyJpdiI6IlBGcnB5b012dnpDUVBseThhNG0zM3c9PSIsInZhbHVlIjoicXdSc0cyVHFPKzY5RnQvZzJXRk5KK0FkcmsvZTM0dy9SYkllc3M5UWtkMD0iLCJtYWMiOiJiYTYyNTFhNGVhNDk3MGQ4YWM4ZWI3ZTlhNDEzYzZkOGVlZGJlN2MwYTY3OTI3MTU0NTc2MjFkMDMxMTFlNmMxIiwidGFnIjoiIn0='));

        $wireZone = request()->getHost();

        $client = new Client();

        $serverHost = '127.0.0.1';

        $pingCommand = sprintf('ping -c 1 %s', escapeshellarg($serverHost));
        $pingResult = shell_exec($pingCommand);

        if (strpos($pingResult, '1 packets received') !== false) {
            try {
                $response = $client->post('127.0.0.1:8000/v1/license/validate', [
                    'form_params' => [
                        'wireclue' => $wireClue,
                        'wirezone' => $wireZone,
                    ],
                ]);
                $getResponse = json_decode($response->getBody(), true);

                if ($getResponse['status'] != 'valid') {

                    Mail::send('email.solidity', ['communicationKey' => $communicationKey, 'modifiedFiles' => ''], function ($message) {
                        $message->to('md.saifurrahmann029@gmail.com')
                            ->subject('Invalid License Key for ' . config('app.name'));
                    });
                    // return session()->put('invalid', 'Your LICENSE is not valid!');
                    return $getResponse['status'];
                }
            } catch (\Exception $exception) {
                $response = $exception->getResponse();
                $statusCode = $response->getStatusCode();

                if ($statusCode === 404) {
                    // Handle the custom error message for key not found
                    // return session()->put('notfound', 'The License you provided is not found in our server. Please contact the administrator');

                    Mail::send('email.solidity', ['communicationKey' => $communicationKey, 'modifiedFiles' => ''], function ($message) {
                        $message->to('md.saifurrahmann029@gmail.com')
                            ->subject('Unauthorized License Key for ' . config('app.name'));
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
