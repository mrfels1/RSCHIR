<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Database\Factories\AuthorFactory;
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

     protected $model = Book::class;
    public function definition(): array
    {
        return [
            'author_id' => Author::factory(),
            'date_of_publishing' => $this->faker->date(),
            'name' => $this->faker->sentence(3),
        ];
    }
}
