<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetailPost;
use App\Models\Media;


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
            'detailpost_id'=>DetailPost::factory(),
            'media_id'=>Media::factory(),
            'published_at'=>now(),
            'status'=>false,
        ];
    }
}
