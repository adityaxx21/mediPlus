<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userPass = Hash::make("user123");
        $adminPass = Hash::make("admin123");

        User::factory()->create([
            'name' => 'User Beta',
            'email' => 'user@example.com',
            'email_verified_at' => Carbon::now(),
            'roles' => 'users',
            'password' => $userPass,
        ]);

        User::factory()->create([
            'name' => 'Admin Beta',
            'email' => 'admin@example.com',
            'email_verified_at' => Carbon::now(),
            'roles' => 'admin',
            'password' =>  $adminPass,
        ]);
    }
}
