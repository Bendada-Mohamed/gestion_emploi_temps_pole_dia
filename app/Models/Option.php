<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'nom',
        'filiere_id'
    ];

    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }

    public function groupes(){
        return $this->hasMany(Groupe::class);
    }
}
