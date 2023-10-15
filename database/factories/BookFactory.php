<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $authors = Author::all();

        return [
            'title' => $this->faker->sentence,
            'author_id' => $authors->random()->id,
            'genre' => $this->faker->word,
            'synopsis' => $this->faker->paragraph,
            'cover' => $this->faker->imageUrl,
            'publication_year' => $this->faker->year,
        ];
    }
}
