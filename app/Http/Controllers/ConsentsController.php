<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Consents;
use App\Models\Media;

class ConsentsController extends Controller
{
    public function twitter()
    {
        $media = Media::where('name', 'twitter')->first();
        $consent = Consents::where(['media_id' => $media->id, 'user_id' => request()->user()->id])->first();
        return view('components.twitter', ['media' => $media, 'consent' => $consent,]);
    }
    public function reddit()
    {
        $media = Media::where('name', 'reddit')->first();
        $consent = Consents::where(['media_id' => $media->id, 'user_id' => request()->user()->id])->first();
        return view('components.reddit', ['media' => $media, 'consent' => $consent,]);
    }
    public function mastodon()
    {
        $media = Media::where('name', 'mastodon')->first();
        $consent = Consents::where(['media_id' => $media->id, 'user_id' => request()->user()->id])->first();
        return view('components.mastodon', ['media' => $media, 'consent' => $consent,]);
    }

    public function store()
    {
        Consents::create(array_merge($this->validateAuth(), [
            'user_id' => request()->user()->id,
        ]));
        session()->forget('reddit_access_token');
        return redirect()->back()->with('success', 'Your key has been created.');
    }
    public function update(Consents $consent)
    {
        $attributes = $this->validateAuth($consent);
        
        $consent->update($attributes);

        return back()->with('success', 'Consent Updated!');
    }

    public function destroy(Consents $consent)
    {
        $consent->delete();
        return back()->with('success', 'Key Deleted!');
    }

    protected function validateAuth(?Consents $auth = null): array
    {
        $auth = $auth ?? new Consents();

        $validationRules = [
            'consumer_key' => 'nullable',
            'consumer_secret' => 'nullable',
            'access_token' => 'nullable',
            'token_secret' => 'nullable',
            'bearer_token' => 'nullable',
            'client_id' => 'nullable',
            'client_secret' => 'nullable',
            'media_id' => 'nullable',
        ];

        // Añadir reglas adicionales para la actualización si es necesario
        if ($auth->exists) {
            // Asegurarse de validar solo los campos que deseas actualizar
            $validationRules = array_intersect_key($validationRules, request()->all());
        }

        return request()->validate($validationRules);

    }
}
