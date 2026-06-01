<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed default Admin User
        User::updateOrCreate(
            ['email' => 'admin@janavikasam.gov.in'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );
    }
}
