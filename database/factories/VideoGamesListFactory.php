<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VideoGamesList;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VideoGamesList>
 */
class VideoGamesListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'GameTitle' => $this->faker->word(),
            'Developer' => $this->faker->company(),
            'ReleaseDate' => $this->faker->date(),
            'PlayedSince' => $this->faker->date(),
            'Genre' => $this->faker->word(),
            'image' => $this->faker->image('public/storage/images', 640, 480, null, false),
            'Category_id' => Category::inRandomOrder()->first()->id,
            'Status' => $this->faker->randomElement(['Completed', 'On Hold', 'Still Playing']),
        ];
    }
}
