<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@steam.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create pegawai user
        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@steam.com',
            'password' => Hash::make('password123'),
            'role' => 'pegawai',
            'email_verified_at' => now(),
        ]);

        // Create regular user
        User::create([
            'name' => 'User',
            'email' => 'user@steam.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        // Create OAuth test user (with google_id)
        // User::create([
        //     'name' => 'Google User',
        //     'email' => 'google@example.com',
        //     'password' => null,
        //     'google_id' => 'test-google-id-123',
        //     'role' => 'user',
        //     'email_verified_at' => now(),
        // ]);

        $this->command->info('Test users created successfully!');
        $this->command->info('Admin: admin@example.com / password123');
        $this->command->info('Pegawai: pegawai@example.com / password123');
        $this->command->info('User: user@example.com / password123');
        $this->command->info('Google User: google@example.com (no password, uses OAuth)');
    }
}
