<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\TypePost;
use App\Models\DetailPost;
use App\Models\Consents;

class PostController extends Controller
{        

    public function instant()
    {   
        $typepost = TypePost::where('name', 'instant')->first();
        $apis = Consents::join('media', 'consents.media_id', '=', 'media.id')->select('media.id as id', 'media.name as name')->get();
        return view('components.instant', [ 'typepost' => $typepost, 'apis' =>$apis]);
    }
    public function queued()
    {
        $typepost = TypePost::where('name', 'instant')->first();
        $apis = Consents::join('media', 'consents.media_id', '=', 'media.id')->select('media.id as id', 'media.name as name')->get();
        return view('components.queued', [ 'typepost' => $typepost, 'apis' =>$apis]);
    }
    public function scheduled()
    {
        $typepost = TypePost::where('name', 'instant')->first();
        $apis = Consents::join('media', 'consents.media_id', '=', 'media.id')->select('media.id as id', 'media.name as name')->get();
        return view('components.scheduled', [ 'typepost' => $typepost, 'apis' =>$apis]);
    }
    public function store(Request $request)
    {   
        $attributesPost = request()->validate([
            'enunciated' => 'nullable',
            'thumbnail' => 'nullable|image',
        ]);

        
        $attributesPost['user_id'] = request()->user()->id;
        $post=Post::create($attributesPost);

        $attributesDetailPost['post_id'] = $post->id;
        $apis = Consents::join('media', 'consents.media_id', '=', 'media.id')->select('media.id as id', 'media.name as name')->get();
        if ($request->filled('date') && $request->filled('hour')) {
            $date = $request->input('date');
            $hour = $request->input('hour');

            $attributesDetailPost['publish_at'] = Carbon::parse($date . ' ' . $hour);
        }
        foreach ($apis as $apiId) {
            
            if ($request->filled($apiId->name)) {
                $miCheckbox = $request->input($apiId->name);

                if ($miCheckbox == 1) {
                    $attributesDetailPost['media_id'] = $post->id;
                    DetailPost::create($attributesDetailPost);
                }
            }
        }
        
        
        

        return redirect()->back()->with('success', 'Your publication has been created.');
    }
}
