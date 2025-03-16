<?php

use App\Models\CustomerFieldSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_field_settings', function (Blueprint $table) {
            $table->id();
            $table->string('field_name');
            $table->string('slug')->unique();
            $table->string('field_type');
            $table->boolean('locked')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('required')->default(false);
            $table->boolean('active')->default(true);
            $table->boolean('label_field')->default(false);
            $table->boolean('custom_field')->default(false);
            $table->timestamps();
        });

        CustomerFieldSetting::create([
            'field_name' => 'name',
            'slug' => 'name',
            'field_type' => 'text',
            'locked' => true,
            'order' => 1,
            'required' => true,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'street',
            'slug' => 'street',
            'field_type' => 'text',
            'locked' => true,
            'order' => 2,
            'required' => true,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'postalcode',
            'slug' => 'postalcode',
            'field_type' => 'text',
            'locked' => true,
            'order' => 3,
            'required' => true,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'city',
            'slug' => 'city',
            'field_type' => 'text',
            'locked' => true,
            'order' => 4,
            'required' => true,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'country',
            'slug' => 'country',
            'field_type' => 'text',
            'order' => 5,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'telephone',
            'slug' => 'telephone',
            'field_type' => 'text',
            'order' => 6,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'email',
            'slug' => 'email',
            'field_type' => 'email',
            'order' => 7,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'website',
            'slug' => 'website',
            'field_type' => 'url',
            'order' => 8,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'description',
            'slug' => 'description',
            'field_type' => 'longtext',
            'order' => 9,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_field_settings');
    }
};
