<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetailPost;
use App\Models\Media;
use App\Models\Post;


class DetailPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id'=>Post::factory(),
            'media_id'=>Media::factory(),
            'published_at'=>now(),
            'status'=>false,
        ];
    }
}
