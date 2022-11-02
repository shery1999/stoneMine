<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => '$2a$12$NgDcoFcR43XZwI5AT6Oq9eyk5mxnYivqVJ/0FPsdJikYdbze3IGH2',
            'role' => 'user'
        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2a$12$NgDcoFcR43XZwI5AT6Oq9eyk5mxnYivqVJ/0FPsdJikYdbze3IGH2',
            'role' => 'admin'
        ]);
    }
}
