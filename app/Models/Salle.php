<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model 
{
    protected $fillable = [
        'code',
        'type',
        'capacite'
    ];

    protected $casts = [
        'capacite' => 'integer'
    ];

    public function seances(){
        return $this->hasMany(Seance::class);
    }
}