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
        $faker = \Faker\Factory::create('id_ID');

        Post::factory()
            ->count(5)
            ->forUser([
                'name' => $faker->name,
            ])
            ->create();

        Post::factory()
            ->count(5)
            ->forUser([
                'name' => $faker->name,
            ])
            ->create();
    }
}
