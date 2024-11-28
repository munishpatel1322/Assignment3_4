<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Check for existing email
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'applicant@example.com'], // Check for existing email
            [
                'name' => 'Applicant User',
                'password' => Hash::make('password'),
                'role' => 'applicant',
            ]
        );

        User::updateOrCreate(
            ['email' => 'reviewer@example.com'], // Check for existing email
            [
                'name' => 'Reviewer Name',
                'password' => Hash::make('password'),
                'role' => 'reviewer',
            ]
        );
    }
}
