<?php

namespace Database\Seeders;
use \App\Models\Book;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(2)->unverified()->create();

        Book::factory(33)->create()->each(function ($book) {
            $numReviewes = random_int(5, 30);
            Review::factory()->count($numReviewes)->good()->for($book)->create();
        });

        Book::factory(33)->create()->each(function ($book) {
            $numReviewes = random_int(5, 30);
            Review::factory()->count($numReviewes)->avg()->for($book)->create();
        });

        Book::factory(33)->create()->each(function ($book) {
            $numReviewes = random_int(5, 30);
            Review::factory()->count($numReviewes)->bad()->for($book)->create();
        });
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
