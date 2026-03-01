<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groupe_formateur', function (Blueprint $table) {
            $table->foreignId('groupe_id')->constrained()->cascadeOnDelete();
            $table->foreignId('formateur_id')->constrained()->cascadeOnDelete();
            $table->primary(['formateur_id', 'groupe_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_formateur');
    }
};
