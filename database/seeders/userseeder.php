<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin ',
            'email' => 'email',
            'phone' => 'phone',
            'address' => 'address',
            'gender' => 'gender',
            'date_of_birth' => 'date_of_birth',
            'avatar' => 'avatar',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

         User::create([
            'name' => 'User ',
            'email' => 'email',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
    }
}
