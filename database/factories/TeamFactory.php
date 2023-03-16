<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "amount"=> $this->faker->randomFloat(),
            "name"=> $this->faker->name(),
            "nickname"=> $this->faker->word(),
            "ranking"=> $this->faker->randomNumber(),
            "state"=> $this->faker->boolean()
        ];
    }
}
