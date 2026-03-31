<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\OrderState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Demo',
            'email' => 'admin@demo.com',
            'password' => 'adminadmin',
            'role' => User::USER_ROLE_SUPER_ADMIN,
            'phone' => '000000000',
        ]);
        
        OrderState::create([
            'name' => 'Received',
            'color' => '#bedbff',
            'is_final' => true,
            'is_cancelled' => false,
        ]);

        OrderState::create([
            'name' => 'Completed',
            'color' => '#01c148',
            'is_final' => true,
            'is_cancelled' => false,
        ]);

        OrderState::create([
            'name' => 'Processing',
            'color' => '#cbce05',
            'is_final' => false,
            'is_cancelled' => false,
        ]);
        
        OrderState::create([
            'name' => 'Cancelled',
            'color' => '#fb2c36',
            'is_final' => false,
            'is_cancelled' => true,
        ]);
    }
}
