<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QueuedScheduleFactory extends Factory
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
            'post_id' => null,
            'publish_at' => now(),
            'status' => $this->faker->boolean,
        ];
    }
}
