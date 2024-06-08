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
    public function responsable()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class, 'id');
}
}