<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => 'How create awesome app from simple idea',
            ])
            ->create([
                'email' => 'johndoe@email.com',
            ]);

        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => 'How create awesome app from simple idea',
            ])
            ->create();

        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => 'Automate your application distribution with CI/CD',
            ])
            ->create([
                'email' => 'mrx@email.com',
            ]);

        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => 'Automate your application distribution with CI/CD',
            ])
            ->create();
    }
}
