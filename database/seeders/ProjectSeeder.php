<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

     protected function fakeHTMLParagraphs($count = 3) {
        $bodyArray = fake()->paragraphs($count);
        $body = '<p>' . join('</p><p>', $bodyArray ) . '</p>';
        return $body;
    }

    public function run()
    {
        Project::create([
            'title' => 'Portfolio Showcase',
            'slug' => 'portfolio-showcase',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(4),
            'category_id' => 3,
            'featured' => true
        ]);
        Project::create([
            'title' => 'SSD Yearbook',
            'slug' => 'ssd-yearbook',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 1
        ]);
        Project::create([
            'title' => 'Movie Mania',
            'slug' => 'movie-mania',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(5)
        ]);
        Project::create([
            'title' => 'News Site Homepage',
            'slug' => 'news-site-homepage',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2
        ]);
        Project::create([
            'title' => 'JavaScript Game',
            'slug' => 'javascript-game',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2
        ]);
        Project::create([
            'title' => 'iOS App',
            'slug' => 'ios-app',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs()
        ]);
        Project::create([
            'title' => 'Android App',
            'slug' => 'android-app',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs()
        ]);
        Project::create([
            'title' => 'Industry Project',
            'slug' => 'industry-project',
            'image' => 'biscuit.jpg',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(6),
            'category_id' => 3
        ]);

    }
}
