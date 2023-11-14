<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Social;

class AuthorizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'social_id'=> Social::factory(),
            'consumer_key' => $this->faker->sha256,
            'consumer_secret' => $this->faker->sha256,
            'access_token' => $this->faker->sha256,
            'token_secret' => $this->faker->sha256,
            'bearer_token' => $this->faker->sha256,
            'client_id' => $this->faker->sha256,
            'client_secret' => $this->faker->sha256,
        ];
    }
}
