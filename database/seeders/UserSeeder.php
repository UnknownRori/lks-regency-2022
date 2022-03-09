<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'UnknownRori',
            'email' => 'UnknownRori@mail.com',
            'password' => 'UnknownRori',
            'admin' => 1,
        ]);

        User::factory(8)->create();
    }
}
