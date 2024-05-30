<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_naissance',
        'lieu_naissance',
        'nationalite',
        'sexe',
        'situation_matrimoniale',
        'photo',
        'cv',
        'motivation',
        'email', // Ensure email is fillable
    ];
    public function dossiersDeCandidature()
    {
        return $this->hasMany(DossierCandidature::class);
    }
}
