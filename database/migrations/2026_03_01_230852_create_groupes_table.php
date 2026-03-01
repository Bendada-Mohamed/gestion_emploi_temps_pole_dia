<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(){
        Schema::create('groupes', function(Blueprint $table){
            $table->id();
            $table->string('code')->unique();
            $table->enum('annee', ['1', '2']);
            $table->foreignId('filiere_id')->constrained()->cascadeOnDelete();
            $table->foreignId('option_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('groupes');
    }
};