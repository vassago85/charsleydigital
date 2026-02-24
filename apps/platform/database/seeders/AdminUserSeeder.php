<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('app.env') === 'local' ? env('ADMIN_EMAIL') : null;
        $password = config('app.env') === 'local' ? env('ADMIN_PASSWORD') : null;

        if (! $email || ! $password) {
            $this->command->warn('ADMIN_EMAIL and ADMIN_PASSWORD must be set in .env to create admin user.');

            return;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Admin user created/updated.');
    }
}
