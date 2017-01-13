<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "Dogs"
        ]);

        Category::create([
            "name" => "Cats"
        ]);

        Category::create([
            "name" => "Fish"
        ]);

        Category::create([
            "name" => "Birds"
        ]);

        Category::create([
            "name" => "Small animals"
        ]);
    }
}
