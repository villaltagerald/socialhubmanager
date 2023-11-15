<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TypePost;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'user_id'=>User::factory(),
            'enunciated'=>$this->faker->paragraphs(6),
            'typepost'=>TypePost::factory(),
        ];
    }
}
