<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // CLIENT USER
        User::factory()->create([
            'email' => 'clientuser@gmail.com',
            'password' => bcrypt(123456),
        ]);

        // ADMIN USER
        User::factory()->create([
            'email' => 'adminuser@gmail.com',
            'password' => bcrypt(123456),
        ]);
    }
}
