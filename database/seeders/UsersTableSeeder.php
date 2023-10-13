<?php

Namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Insert sample user data into the users table
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Hash the password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add more user records if needed
    }
}
