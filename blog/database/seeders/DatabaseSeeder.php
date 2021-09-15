<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();        
        $user = User::factory()->create();

        Category::truncate();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        $hobbies = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'category_id' => $work->id,
            'user_id' => $user->id,
            'slug' => 'my-first-post',
            'title' => 'my-first-post',
            'resumen' => 'Resumen-post-1',
            'body' => 'Texto-post-1'
        ]);
    }
}
