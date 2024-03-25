<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create {name} {email} {password}';
    protected $description = 'Create a new user';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = Hash::make($this->argument('password'));

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $this->info('User created successfully!');
    }
}
