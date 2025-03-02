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
            'model' => 'CUSTOMER',
            'name' => 'Name',
            'slug' => 'name',
            'type' => 'text',
            'required' => false,
            'order' => 1,
        ]);

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => 'E-Mail',
            'slug' => 'email',
            'type' => 'text',
            'required' => false,
            'order' => 2,
        ]);

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => 'Straße',
            'slug' => 'strasse',
            'type' => 'text',
            'required' => false,
            'order' => 3,
        ]);

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => 'Postleitzahl',
            'slug' => 'postleitzahl',
            'type' => 'text',
            'required' => false,
            'order' => 4,
        ]);

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => 'Stadt',
            'slug' => 'stadt',
            'type' => 'text',
            'required' => false,
            'order' => 5,
        ]);

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => 'Datum Vertragsabschluss',
            'slug' => 'date',
            'type' => 'date',
            'required' => false,
            'order' => 6,
        ]);

        CustomField::create([
            'model' => 'CUSTOMER',
            'name' => 'Webseite',
            'slug' => 'webseite',
            'type' => 'url',
            'required' => false,
            'order' => 7,
        ]);
    }
}
