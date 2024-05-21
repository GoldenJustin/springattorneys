<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'springattorneys',
            'email' => 'admin@springattorneys.com',
            'password' => Hash::make('12345678'), // Use Hash::make to hash the password
        ]);

        // User::create([
        //     'name' => 'Regular User',
        //     'email' => 'user@example.com',
        //     'password' => Hash::make('password'), // Use Hash::make to hash the password
        // ]);
    }
}
