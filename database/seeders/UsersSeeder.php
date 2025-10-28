<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
   
    public function run(): void {
        \App\Models\User::firstOrCreate(
            [
                'surname' => 'ADMIN',
                'name' => 'ADMIN',
                'email' => 'admin@example.ex',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        );
    }
}
