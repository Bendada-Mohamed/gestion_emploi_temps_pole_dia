<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'email_professionnel',
        'telephone',
        'specialite'
    ];

    public function seances(){
        return $this->hasMany(Seance::class);
    }

    public function groupes(){
        return $this->belongsToMany(Groupe::class, 'groupe_formateur', 'formateur_id', 'groupe_id')
                    ->withTimestamps();
    }

}
