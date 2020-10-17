<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->forUser([
                'name' => 'John Doe',
            ])
            ->create([
                'title' => 'How create awesome app from simple idea',
            ]);

        Post::factory()
            ->forUser([
                'name' => 'Mr. X',
            ])
            ->create([
                'title' => 'Automate your application distribution with CI/CD',
            ]);
    }
}
