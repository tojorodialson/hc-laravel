<?php

namespace Codise\Hclaravel;

use Illuminate\Support\Facades\Http;
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

            $res =  response()->json([
                        'status'    => $res->getStatusCode(),
                        'message'   => $res->getReasonPhrase()
                    ]);
            $json = json_encode($res);
            $json = json_decode($json, true);
            return $json['original'];
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
