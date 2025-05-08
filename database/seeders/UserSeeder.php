<?php

namespace Database\Seeders;

use App\Models\Comment;
use Phaseolies\Database\Migration\Seeder;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Reply;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => bcrypt('password')
        ]);
    }
}
