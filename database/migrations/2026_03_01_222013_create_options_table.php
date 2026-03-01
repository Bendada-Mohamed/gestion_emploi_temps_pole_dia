<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(){
        Schema::create('options', function(Blueprint $table){
            $table->id();
            $table->string('nom');
            $table->foreignId('filiere_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('options');
    }
};