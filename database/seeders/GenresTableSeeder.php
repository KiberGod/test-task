<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert(
            [
                [
                    'name' => "Biographies"
                ],
                [
                    'name' => "Action"
                ],
                [
                    'name' => "Westerns"
                ],
                [
                    'name' => "Military"
                ],
                [
                    'name' => "Detectives"
                ],
                [
                    'name' => "Documentaries"
                ],
                [
                    'name' => "Dramas"
                ],
                [
                    'name' => "Historical"
                ],
                [
                    'name' => "Comedies"
                ],
                [
                    'name' => "Crime"
                ],
                [
                    'name' => "Melodramas"
                ],
                [
                    'name' => "Cartoons"
                ],
                [
                    'name' => "Adventures"
                ],
                [
                    'name' => "Family"
                ],
                [
                    'name' => "Thrillers"
                ],
                [
                    'name' => "Horror"
                ],
                [
                    'name' => "Fantasy"
                ],
                [
                    'name' => "Fantasy"
                ],
                [
                    'name' => "Sports"
                ],
                [
                    'name' => "Reality Show"
                ]
            ]
        );
    }
}
