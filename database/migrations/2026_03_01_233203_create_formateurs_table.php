<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(){
        Schema::create('formateurs', function(Blueprint $table){
            $table->id();
            $table->string('matricule')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email_professionnel');
            $table->string('telephone')->nullable();
            $table->string('specialite')->nullable();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('formateurs');
    }
};