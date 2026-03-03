<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = [
        'code',
        'annee',
        'filiere_id',
        'option_id'
    ];

    protected $casts = [
        'annee' => 'string'
    ];

    public function seances(){
        return $this->hasMany(Seance::class);
    }

    public function formateurs(){
        return $this->belongsToMany(Formateur::class, 'groupe_formateur', 'groupe_id', 'formateur_id')
                    ->withTimestamps();
    }

    public function option(){
        return $this->belongsTo(Option::class);
    }

    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
}
