<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'First Article',
            'body' => 'This is the body of the first article.'
        ]);

        Article::create([
            'title' => 'Second Article',
            'body' => 'This is the body of the second article.'
        ]);

        Article::create([
            'title' => 'Third Article',
            'body' => 'This is the body of the third article.'
        ]);
    }
}
