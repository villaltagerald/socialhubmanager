<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fundevogel\Mastodon\Api;
use GuzzleHttp\Client;

class MastodonController extends Controller
{
    public function postMastodon($enunciated, $consent)
    {
        // Configuración de la URL y el token de acceso
        $url = 'https://mastodon.social/api/v1/statuses';
        $accessToken = $consent->bearer_token; // Reemplaza con tu token de acceso

        // Configuración del cliente Guzzle
        $client = new Client();

        // Datos del cuerpo en formato JSON
        $body = [
            'status' => $enunciated,
        ];

        // Realiza la solicitud POST con el encabezado de autorización y el cuerpo JSON
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => $body,
        ]);

        // Obtiene la respuesta como un array asociativo
        $data = json_decode($response->getBody(), true);

        return $data;

    }
}
