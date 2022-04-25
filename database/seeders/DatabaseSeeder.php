<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Vidio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Post::create(
            [
                'title' => 'post1',

            ]

        );
        Post::create(
            [
                'title' => 'post2',

            ]
        );
        Post::create(
            [
                'title' => 'post3',

            ]
        );

        Vidio::create(
            [
                'title' => 'vidio1',

            ]
        );
        Vidio::create(
            [
                'title' => 'vidio2',

            ]
        );
        Vidio::create(
            [
                'title' => 'vidio3',

            ]
        );
        Tag::create(
            [
                'name' => 'tag1',

            ]
        );
        Tag::create(
            [
                'name' => 'tag2',

            ]
        );
        Tag::create(
            [
                'name' => 'tag3',

            ]
        );
    }
}
