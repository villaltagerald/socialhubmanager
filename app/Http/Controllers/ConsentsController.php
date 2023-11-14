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
        $consent=Consents::where([
            'media_id'=>$media->id,
            'user_id'=>request()->user()->id
            ])->first();
        return view('components.twitter', [
            'media' => $media,
            'consent'=>$consent,
        ]);
    }
    public function reddit()
    {
        $media = Media::where('name', 'reddit')->first();
        $consent=Consents::where([
            'media_id'=>$media->id,
            'user_id'=>request()->user()->id
            ])->first();
        return view('components.reddit', [
            'media' => $media,
            'consent'=>$consent,
        ]);
    }
    public function pinterest()
    {
        $media = Media::where('name', 'pinterest')->first();
        $consent=Consents::where([
            'media_id'=>$media->id,
            'user_id'=>request()->user()->id
            ])->first();
        return view('components.pinterest', [
            'media' => $media,
            'consent'=>$consent,
        ]);
    }

    public function store()
    {
        Consents::create(array_merge($this->validateAuth(),[
            'user_id' => request()->user()->id,
        ]));

        return redirect('/');
    }

    protected function validateAuth(?Consents $auth = null): array
    {
        $auth = $auth ?? new Consents();

        return request()->validate([
            'consumer_key' => 'required',
            'consumer_secret' => 'required',
            'access_token' => 'required',
            'token_secret' => 'required',
            'bearer_token' => 'required',
            'client_id' =>'required',
            'client_secret' => 'required',
            'media_id' => 'required',
        ]);

    }
}
