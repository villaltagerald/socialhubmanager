<?php

namespace App\Http\Controllers;

use App\Models\Consents;
use GuzzleHttp\Client;
use Socialite;

class RedditController extends Controller
{
    public function redirectToReddit()
    {
        $result = Consents::select('client_id', 'client_secret')
            ->where('user_id', request()->user()->id)
            ->where('media_id', 2)
            ->first();

        $clientId = $result->client_id;
        $clientSecret = $result->client_secret;
        $redirectUri = 'http://socialhubmanager.isw811.xyz/auth/reddit/callback';

        config([
            'services.reddit' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'redirect' => $redirectUri,
            ],
        ]);
        //dd(Socialite::driver('reddit')->redirect());
        return Socialite::driver('reddit')->with(['duration' => 'permanent'])->redirect();

    }
    public function handleRedditCallback()
    {
        $result = Consents::select('client_id', 'client_secret')
            ->where('user_id', request()->user()->id)
            ->where('media_id', 2)
            ->first();

        $clientId = $result->client_id;
        $clientSecret = $result->client_secret;
        $redirectUri = 'http://socialhubmanager.isw811.xyz/auth/reddit/callback';

        config([
            'services.reddit' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'redirect' => $redirectUri,
            ],
        ]);
        try {
            $user = Socialite::driver('reddit')->user();
            // Accede al token de acceso
            $accessToken = $user->token;

            // Almacena el token en la sesión
            session(['reddit_access_token' => $accessToken]);

        } catch (\Exception $e) {
            dd($e->getMessage(), 'esto es un error');
        }

        return redirect()->route('authorization.reddit.reddit');
    }

    public function makeRedditPost($accessToken)
    {
        //$url = 'http://www.reddit.com/api/submit';
        $client = new Client();
        $response = $client->request('POST', 'https://oauth.reddit.com/api/submit', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken
            ],
            'form_params' => [
                'title' => 'Your Post Title',
                'kind' => 'self',
                'sr' => 'Your Subreddit',
                'resubmit' => true,
                'send_replies' => true,
                'text' => 'Your Post Text'
            ]
        ]);

        // Decodifica la respuesta JSON si es necesario
        $responseData = json_decode($response->getBody(), true);

        dd($response);

        return $response;
    }

}


