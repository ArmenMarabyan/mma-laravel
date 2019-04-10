<?php

use Illuminate\Database\Seeder;
use Mma\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
    		'name' => Str::random(10),
            'alias' => Str::random(10),
            'short_description' => Str::random(100),
            'description' => Str::random(400),
            'source' => Str::random(5),
            'main_article' => 0,
    	]);
    }
}
