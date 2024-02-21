<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 500; $i++) {
            DB::table('genre_movie')->insert([
                'movie_id' => rand(1, 300),
                'genre_id' => rand(1, 20)
            ]);
        }
    }
}
