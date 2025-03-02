<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['text', 'date', 'email', 'url', 'longtext']);
            $table->boolean('required')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('disabled')->default(false);
            $table->boolean('hidden')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_fields');
    }
};
