<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function options(){
        return $this->hasMany(Option::class);
    }

    public function groupes(){
        return $this->hasMany(Groupe::class);
    }
}
