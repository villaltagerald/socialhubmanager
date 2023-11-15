<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
class QueuingScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'post_id' => Post::factory(),
            'publish_at' => now(),
            'status' => $this->faker->boolean,
        ];
    }
}
