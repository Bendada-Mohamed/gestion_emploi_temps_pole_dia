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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['formateur', 'admin', 'stagiaire'])->default('stagiaire')->after('email');
            $table->foreignId('formateur_id')->nullable()->constrained()->nullOnDelete()->after('role');
            $table->foreignId('groupe_id')->nullable()->constrained()->nullOnDelete()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['formateur_id']);
            $table->dropForeign(['groupe_id']);
            $table->dropColumn(['role', 'formateur_id', 'groupe_id']);
        });
    }
};
