<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\User;

class ArticleFactory extends Factory
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
            'contenu' => $this->faker->paragraph(10),
            'contenu_fr' => $this->faker->paragraph(10),
            'user_id'=> User::inRandomOrder()->first()->id,
        ];
    }
}
