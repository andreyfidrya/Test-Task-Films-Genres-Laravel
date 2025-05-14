<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Film;
use Faker\Factory as Faker;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            Film::create([
                'name' => $faker->name,
                'publication_status' => $faker->randomElement(['published' ,'unpublished']),
                'link' => $faker->imageUrl(200, 200),
            ]);
        }
    }
}
