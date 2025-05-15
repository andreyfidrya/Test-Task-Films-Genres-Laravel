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
        Film::insert([
            [
                'name' => 'Home Alone 1',
                'link' => '1747312650.jpg'              
            ],
            [
                'name' => 'Home Alone 2',
                'link' => '1747316540.jpg'              
            ],
            [
                'name' => 'Private Resort 1985',
                'link' => '1747316777.jpg'              
            ],
            [
                'name' => 'Father Of The Bride',
                'link' => 'default-image.jpg'                              
            ],
            [
                'name' => 'Mad Max 2',
                'link' => 'default-image.jpg'                              
            ],
            [
                'name' => 'Some Like It Hot',
                'link' => 'default-image.jpg'                              
            ],
            [
                'name' => 'Blazing Saddles',
                'link' => 'default-image.jpg'                              
            ],
            [
                'name' => 'Man with a Movie Camera',
                'link' => 'default-image.jpg'                              
            ],
            [
                'name' => 'The Lord of the Rings',
                'link' => 'default-image.jpg'                              
            ],
            [
                'name' => 'The Exorcist',
                'link' => 'default-image.jpg'                              
            ],            
        ]);
    }
}
