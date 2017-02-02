<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        User::create([
            'name' => 'Test',
            'email' => 'test@dumy.com',
            'password' => Hash::make('test123')
        ]);
    }
}
