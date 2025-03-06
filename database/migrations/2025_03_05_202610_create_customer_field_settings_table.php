<?php

use App\Models\CustomerFieldSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('field_type');
            $table->integer('order')->default(0);
            $table->boolean('required')->default(false);
            $table->boolean('active')->default(true);
            $table->boolean('custom_field')->default(false);
            $table->timestamps();
        });

        CustomerFieldSetting::create([
            'field_name' => 'name',
            'field_type' => 'text',
            'order' => 1,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'street',
            'field_type' => 'text',
            'order' => 2,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'postalcode',
            'field_type' => 'text',
            'order' => 3,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'city',
            'field_type' => 'text',
            'order' => 4,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'country',
            'field_type' => 'text',
            'order' => 5,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'telephone',
            'field_type' => 'text',
            'order' => 6,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'email',
            'field_type' => 'email',
            'order' => 7,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'website',
            'field_type' => 'url',
            'order' => 8,
        ]);

        CustomerFieldSetting::create([
            'field_name' => 'description',
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
