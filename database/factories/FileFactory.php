<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\File;
use App\Models\User;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'titre_fr' => $this->faker->sentence,
            'path' => $this->faker->sentence,
            'user_id'=> User::inRandomOrder()->first()->id,
        ];
    }
}
