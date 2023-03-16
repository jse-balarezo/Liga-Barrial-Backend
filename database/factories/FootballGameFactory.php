<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FootballGameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date"=> $this->faker->date(),
            "loser"=> $this->faker->word(),
            "number_matches"=> $this->faker->randomNumber(),
            "penalties"=> $this->faker->boolean(),
            "winner"=> $this->faker->name(),
            "tied"=> $this->faker->boolean(),
        ];
    }
}
