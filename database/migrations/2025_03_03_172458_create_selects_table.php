<?php

use App\Models\CustomField;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('selects', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->foreignIdFor(CustomField::class)->constrained()->cascadeOnDelete();
            $table->json('options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selects');
    }
};
