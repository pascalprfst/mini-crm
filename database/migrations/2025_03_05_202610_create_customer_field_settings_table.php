<?php

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
            $table->integer('order')->default(0);
            $table->boolean('active')->default(true);
        });

        $columns = Schema::getColumnListing('customers');

        $filteredColumns = array_filter($columns, function ($column) {
            return !in_array($column, ['created_at', 'updated_at', 'deleted_at']);
        });

        foreach ($filteredColumns as $index => $column) {
            DB::table('customer_field_settings')->insert([
                'field_name' => $column,
                'order' => $index + 1,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_field_settings');
    }
};
