<?php

namespace App\Http\Controllers;

use App\Models\Consents;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Http\Request;
//use Socialite;
use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Reddit\Provider as RedditProvider;

class TwitterController extends Controller
{
    public function postTwitter($consent, $message)
    {
        $stack = HandlerStack::create();

        // Configuración de credenciales OAuth
        $middleware = new Oauth1([
            'consumer_key' => $consent->consumer_key,
            'consumer_secret' => $consent->consumer_secret,
            'token' => $consent->access_token,
            'token_secret' => $consent->token_secret,
        ]);

        // Configuración de OAuth1
        $stack->push($middleware);

        $client = new Client([
            'base_uri' => 'https://api.twitter.com/2/',
            'handler' => $stack,
            'auth' => 'oauth',
        ]);

        try {
            // Datos que deseas enviar en la solicitud POST
            $postData = [
                'text' => $message,
            ];

            // URL específica para la solicitud POST
            $url = 'tweets';

            // Hacer la solicitud POST a la API con autenticación OAuth1
            $response = $client->post($url, [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => $postData,
            ]);
            // Obtener el cuerpo de la respuesta en formato JSON
            $data = json_decode($response->getBody(), true);

            // Trabajar con los datos obtenidos de la API
            // ...

            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            // Manejar errores de la solicitud
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

}


