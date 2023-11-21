<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\TypePost;
use App\Models\DetailPost;
use App\Models\Consents;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\MastodonController;

class PostController extends Controller
{
    protected $apis;
    protected $typeposts;

    public function __construct()
    {
        $this->apis = Consents::join('media', 'consents.media_id', '=', 'media.id')
            ->select('media.id as id', 'media.name as name')
            ->get();

        $this->typeposts = TypePost::all()->keyBy('name');
    }

    public function instant()
    {
        return view('components.instant', ['typepost' => $this->typeposts->get('instant'), 'apis' => $this->apis]);
    }
    public function queued()
    {
        return view('components.queued', ['typepost' => $this->typeposts->get('queued'), 'apis' => $this->apis]);
    }
    public function scheduled()
    {
        return view('components.scheduled', ['typepost' => $this->typeposts->get('scheduled'), 'apis' => $this->apis]);
    }
    protected function getKeyTwitter($media_id)
    {
        return Consents::select('consumer_key', 'consumer_secret', 'access_token', 'token_secret')
            ->where('user_id', request()->user()->id)
            ->where('media_id', $media_id)
            ->first();
    }
    protected function getKeyMastodon($media_id)
    {
        return Consents::select('bearer_token')
            ->where('user_id', request()->user()->id)
            ->where('media_id', $media_id)
            ->first();
    }

    protected function postInstant($checkMedia_id, $enunciated)
    {
        $twitterController = new TwitterController();
        $mastodonController = new MastodonController();

        foreach ($checkMedia_id as $valor) {
            // Realiza la acción dependiendo del valor
            if ($valor === "1") {
                $consent = $this->getKeyTwitter($valor);
                $resultado = $twitterController->postTwitter($consent, $enunciated);
            } elseif ($valor === "2") {
                // Acción para el valor "2"

            } elseif ($valor === "3") {
                $consent = $this->getKeyMastodon($valor);
                $resultado = $mastodonController->postMastodon($enunciated, $consent);

            }
        }
    }

    public function store(Request $request)
    {
        $checkMedia_id = request()->validate([
            'checkboxes' => 'required|array|min:1',
        ]);

        $attributesPost = request()->validate([
            'enunciated' => 'nullable',
            'typepost_id' => 'required',
            'thumbnail' => 'nullable|image',
        ]);

        if ($attributesPost['typepost_id'] == "1") {
            $this->postInstant($checkMedia_id['checkboxes'], $attributesPost['enunciated']);
        }

        $attributesPost['user_id'] = request()->user()->id;

        $post = Post::create($attributesPost);

        $attributesDetailPost['post_id'] = $post->id;


        if ($request->filled('date') && $request->filled('hour')) {
            $date = $request->input('date');
            $hour = $request->input('hour');

            $attributesDetailPost['publish_at'] = Carbon::parse($date . ' ' . $hour);
        }

        foreach ($checkMedia_id['checkboxes'] as $valor) {
            $attributesDetailPost['media_id'] = $valor;
            DetailPost::create($attributesDetailPost);
        }

        return redirect()->back()->with('success', 'Your publication has been created.');
    }
}
