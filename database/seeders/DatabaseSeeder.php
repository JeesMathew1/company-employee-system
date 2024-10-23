<?php

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
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'), // Encrypt the password
            'is_admin' => true, // Add a field to mark as admin
        ]);

        // You can call other seeders here if needed
        // $this->call(OtherSeeder::class);
    }
}
