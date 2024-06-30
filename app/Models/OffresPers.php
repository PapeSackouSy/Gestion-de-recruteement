<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffresPers extends Model
{
    use HasFactory;

    protected $fillable = [
        'photos',
        'Titre',
        'Profil',
        'Exigence',
        'Experience',
        'Details',
        'Description',
        'departement_id'
    ];
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class, 'id');
}
public function dossiersDeCandidature()
{
    return $this->hasMany(DossierDeCandaturePers::class);
}
public function commissions()
{
    return $this->belongsToMany(Commission::class, 'commission_offres_pers');
}
}
