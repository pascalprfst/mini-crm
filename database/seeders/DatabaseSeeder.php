<?php

namespace Database\Seeders;

use App\Models\Customer;
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

        Customer::create();

        CustomField::create([
            'name' => 'Name',
            'slug' => 'name',
            'type' => 'text',
            'required' => false,
            'order' => 1,
        ]);

        CustomField::create([
            'name' => 'E-Mail',
            'slug' => 'email',
            'type' => 'text',
            'required' => false,
            'order' => 2,
        ]);

        CustomField::create([
            'name' => 'Straße',
            'slug' => 'strasse',
            'type' => 'text',
            'required' => false,
            'order' => 3,
        ]);

        CustomField::create([
            'name' => 'Postleitzahl',
            'slug' => 'postleitzahl',
            'type' => 'text',
            'required' => false,
            'order' => 4,
        ]);

        CustomField::create([
            'name' => 'Stadt',
            'slug' => 'stadt',
            'type' => 'text',
            'required' => false,
            'order' => 5,
        ]);
    }
}
