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
    protected static function boot(){
        parent::boot();

        static::saving(function($formateur){
            $formateur->nom    = ucfirst(strtolower($formateur->nom));
            $formateur->prenom = ucfirst(strtolower($formateur->prenom));
        });
    }
}
