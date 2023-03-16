<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "age"=> $this->faker->randomNumber(),
            "name"=> $this->faker->name(),
            "player_position"=> $this->faker->name(),
            "nickname"=> $this->faker->word(),
            "salary"=> $this->faker->randomFloat(),
            "state"=> $this->faker->boolean()
        ];
    }
}
