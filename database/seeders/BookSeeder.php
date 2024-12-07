<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()->count(rand(10, 20))->has(
            Book::factory()->count(rand(1, 10))
            )->create();
            Author::factory()->count(rand(10, 20))->has(
                Book::factory()->count(rand(1, 10))
                )->create();
                Author::factory()->count(rand(10, 20))->has(
                    Book::factory()->count(rand(1, 10))
                    )->create();
    }
}
