<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerValue;
use App\Models\CustomField;
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
        User::factory()->create([
            'name' => 'Pascal',
            'email' => 'pascal@bundesweit.digital',
            'password' => bcrypt('password'),
        ]);
        
    }
}
