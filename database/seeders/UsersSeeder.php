<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create multiple sample users
        User::create([
            'nick' => 'user1',
            'name' => 'Alice',
            'surnames' => 'Smith',
            'DNI' => '111223344',
            'email' => 'user1@example.com',
            'password' => Hash::make('1234'),
            'birth' => '1995-05-15',
        ]);
        User::create([
            'nick' => 'admin',
            'name' => 'Admintrator',
            'surnames' => 'Root Admin',
            'DNI' => '99999999Z',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234'),
            'birth' => '1995-05-15',
            'role' => 1,
        ]);

        User::create([
            'nick' => 'user2',
            'name' => 'Bob',
            'surnames' => 'Johnson',
            'DNI' => '555667788',
            'email' => 'user2@example.com',
            'password' => Hash::make('password2'),
            'birth' => '1988-08-22',
        ]);

        User::create([
            'nick' => 'user3',
            'name' => 'Charlie',
            'surnames' => 'Brown',
            'DNI' => '999888777',
            'email' => 'user3@example.com',
            'password' => Hash::make('password3'),
            'birth' => '1992-11-10',
        ]);
    }
}
