<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
//         \App\Models\User::factory(10)->create();
//         Category::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'JohnDoe',
            'email' => 'michael@email.com',
        ]);
         Post::factory(30)->create([
             'user_id' => $user->id,
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
