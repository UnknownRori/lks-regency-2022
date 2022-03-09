<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(4)->count(4)->has(
            Posts::factory(10)->count(10)->for(
                User::factory()
            )
        )->create();
    }
}
