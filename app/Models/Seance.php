<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $fillable = [
        'groupe_id',
        'formateur_id',
        'salle_id',
        'date',
        'heure_debut',
        'heure_fin'
    ];

    protected $casts = [
        'date' => 'date',
        'heure_debut' => 'string',
        'heure_fin' => 'string',
    ];

    public function salle(){
        return $this->belongsTo(Salle::class);
    }

    public function formateur(){
        return $this->belongsTo(Formateur::class);
    }

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }
}