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
        $faker = \Faker\Factory::create('id_ID');

        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => $faker->sentence(8, true),
            ])
            ->create([
                'name' => 'John Doe',
                'email' => 'johndoe@email.com',
                'website' => $faker->domainName,
            ]);

        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => $faker->sentence(8, true),
            ])
            ->create();

        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => $faker->sentence(8, true),
            ])
            ->create([
                'name' => 'Mr. X',
                'email' => 'mrx@email.com',
                'website' => $faker->domainName,
            ]);

        Comment::factory()
            ->count(3)
            ->forPost([
                'title' => $faker->sentence(8, true),
            ])
            ->create();
    }
}
