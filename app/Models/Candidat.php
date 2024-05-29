<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable = [ 'photo','cv', 'motivation','date_naissance','lieu_naissance','nationalite','sexe','situation_matrimoniale'];
    public function dossiersDeCandidature()
    {
        return $this->hasMany(DossierCandidature::class);
    }
}
