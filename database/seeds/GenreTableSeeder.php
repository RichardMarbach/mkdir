<?php

use Illuminate\Database\Seeder;

use App\Models\Genre;

class GenreTableSeeder extends Seeder
{

    private $genres = [
      ['genre' => 'Action'],
      ['genre' => 'SciFi'],
      ['genre' => 'Romance'],
      ['genre' => 'Horror'],
      ['genre' => 'Comedy'],
      ['genre' => 'Drama'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->genres as $genre) {
          Genre::create($genre);
        }
    }
}
