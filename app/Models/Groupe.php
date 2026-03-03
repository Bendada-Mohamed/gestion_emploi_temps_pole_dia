<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Option;

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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($groupe) {
            if ($groupe->option_id) {
                $option = Option::find($groupe->option_id);
                if ($option->filiere_id !== $groupe->filiere_id) {
                    throw new \InvalidArgumentException(
                        "L'option sélectionnée n'appartient pas à la filière choisie."
                    );
                }
            }
        });
    }
}
