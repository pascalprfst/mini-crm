<?php

use App\Models\ContactFieldSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_field_settings', function (Blueprint $table) {
            $table->id();
            $table->string('field_name');
            $table->string('slug')->unique();
            $table->string('field_type');
            $table->integer('order')->default(0);
            $table->boolean('required')->default(false);
            $table->boolean('active')->default(true);
            $table->boolean('custom_field')->default(false);
            $table->timestamps();
        });

        ContactFieldSetting::create([
            'field_name' => 'first_name',
            'slug' => 'first_name',
            'field_type' => 'text',
            'order' => 1,
            'required' => true,
        ]);

        ContactFieldSetting::create([
            'field_name' => 'last_name',
            'slug' => 'last_name',
            'field_type' => 'text',
            'order' => 2,
            'required' => true,
        ]);

        ContactFieldSetting::create([
            'field_name' => 'email',
            'slug' => 'email',
            'field_type' => 'email',
            'order' => 3,
            'required' => true,
        ]);

        ContactFieldSetting::create([
            'field_name' => 'telephone',
            'slug' => 'telephone',
            'field_type' => 'text',
            'order' => 4,
            'required' => true,
        ]);

        ContactFieldSetting::create([
            'field_name' => 'street',
            'slug' => 'street',
            'field_type' => 'text',
            'order' => 5,
        ]);

        ContactFieldSetting::create([
            'field_name' => 'postalcode',
            'slug' => 'postalcode',
            'field_type' => 'text',
            'order' => 6,
        ]);

        ContactFieldSetting::create([
            'field_name' => 'city',
            'slug' => 'city',
            'field_type' => 'text',
            'order' => 7,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_field_settings');
    }
};
