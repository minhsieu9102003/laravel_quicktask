<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test@example.com',
                'is_admin' => false,
                'is_active' => true,
                'username' => 'testuser',
            ]);
        }

        $this->call([
            CreateInitialAdminAccount::class,
        ]);
    }
}
