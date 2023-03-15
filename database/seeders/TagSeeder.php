<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Tag::create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        Tag::create([
            'name' => 'Node.js',
            'slug' => 'node-js',
        ]);
        Tag::create([
            'name' => 'JavaScript',
            'slug' => 'javascript',
        ]);
        Tag::create([
            'name' => 'Vue.js',
            'slug' => 'vue-js',
        ]);
        Tag::create([
            'name' => 'React.js',
            'slug' => 'react-js',
        ]);
        Tag::create([
            'name' => 'HTML',
            'slug' => 'html',
        ]);
        Tag::create([
            'name' => 'CSS',
            'slug' => 'css',
        ]);
        Tag::create([
            'name' => 'Bootstrap',
            'slug' => 'bootstrap',
        ]);
        Tag::create([
            'name' => 'Tailwind CSS',
            'slug' => 'tailwind-css',
        ]);
        Tag::create([
            'name' => 'MySQL',
            'slug' => 'mysql',
        ]);
        Tag::create([
            'name' => 'MongoDB',
            'slug' => 'mongodb',
        ]);
        Tag::create([
            'name' => 'Git',
            'slug' => 'git',
        ]);
        Tag::create([
            'name' => 'GitHub',
            'slug' => 'github',
        ]);
        Tag::create([
            'name' => 'Docker',
            'slug' => 'docker',
        ]);
        Tag::create([
            'name' => 'Ubuntu',
            'slug' => 'ubuntu',
        ]);
        Tag::create([
            'name' => 'AWS',
            'slug' => 'aws',
        ]);
        Tag::create([
            'name' => 'Linux',
            'slug' => 'linux',
        ]);
        Tag::create([
            'name' => 'Apache',
            'slug' => 'apache',
        ]);
        Tag::create([
            'name' => 'Nginx',
            'slug' => 'nginx',
        ]);
        Tag::create([
            'name' => 'MAMP',
            'slug' => 'mamp',
        ]);
        Tag::create([
            'name' => 'Shopify',
            'slug' => 'shopify',
        ]);
        Tag::create([
            'name' => 'WordPress',
            'slug' => 'wordpress',
        ]);
        Tag::create([
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
        ]);
    }
}
