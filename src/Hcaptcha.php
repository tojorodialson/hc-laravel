<?php

namespace Codise\Hclaravel;

use Illuminate\Support\Facades\Http;
use Response;
use GuzzleHttp\Client;

class Hcaptcha
{
    // Build your next great package.
    public static function verify($response) {
        $client = new Client();

        $data = [
            'form_params' => [
                'secret' => config('hcaptcha.secret_key'),
                'response' => $response
            ]
        ];

        try {
            $res =  $client->request('POST', 'https://hcaptcha.com/siteverify', $data);
            $body = $res->getBody();
            $json = json_decode($body);
            return $json;
        } catch(\Exception $e) {
            return Response::json(['error' => $e->getMessage()]);
        }
    }
}
