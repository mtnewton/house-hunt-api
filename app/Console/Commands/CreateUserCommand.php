<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUserCommand extends Command
{
    protected $signature = 'create:user {name} {email} {password}';

    protected $description = 'Create a user with the given name, email, and password';


    public function handle()
    {
        if (User::where('email', $this->argument('email'))->count()) {
            return $this->error('A user already has that email address');
        }

        $user = new User();
        $user->name = $this->argument('name');
        $user->email = $this->argument('email');
        $user->password = Hash::make($this->argument('password'));
        $user->api_token = Str::random(32);
        $user->save();

        $this->info("User created with id {$user->id}");
    }
}