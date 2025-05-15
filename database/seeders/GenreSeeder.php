<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Genre;
use Faker\Factory as Faker;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::insert([
            [
                'name' => 'action'                
            ],
            [
                'name' => 'comedy'                
            ],
            [
                'name' => 'musical'                
            ],
            [
                'name' => 'drama'                
            ],
            [
                'name' => 'documentary'                
            ],
            [
                'name' => 'fantasy'                
            ],
            [
                'name' => 'horror'                
            ],
            [
                'name' => 'science fiction'                
            ],
            [
                'name' => 'thriller'                
            ],
            [
                'name' => 'romance'                
            ],
        ]);
    }
}
