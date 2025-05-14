<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Film;
use App\Models\Genre;
use Faker\Factory as Faker;

class FilmGenreSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
        DB::table('film_genre')->insert([
        'film_id' => $faker->randomElement(\App\Models\Film::pluck('id')),
        'genre_id' => $faker->randomElement(\App\Models\Genre::pluck('id')),
        ]);
        }
            }
}
