<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $registeredUsers = [
            [
                'name' => 'Alberto Miron',
                'email' => 'albertomiron19@gmail.com',
                'password' => 'password'

            ]
        ];

        foreach ($registeredUsers as $registeredUser) {
            
            $user = User::create([
                'name' => $registeredUser['name'],
                'email' => $registeredUser['email'],
                'password' => Hash::make($registeredUser['password'])
            ]);
        };
    }
}
