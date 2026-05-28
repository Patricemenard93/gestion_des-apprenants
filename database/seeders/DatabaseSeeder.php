<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@cftp-l2c.test'],
            [
                'name' => 'Administrateur CFTP-L2C',
                'password' => 'password',
                'role' => UserRole::Admin,
                'email_verified_at' => now(),
            ],
        );

        User::query()->updateOrCreate(
            ['email' => 'user@cftp-l2c.test'],
            [
                'name' => 'Utilisateur Lecture',
                'password' => 'password',
                'role' => UserRole::User,
                'email_verified_at' => now(),
            ],
        );

        $this->call(DemoDataSeeder::class);
    }
}
