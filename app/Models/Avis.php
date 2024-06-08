<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    protected $fillable = [
        'composition_dossier',
        'depot_candidature',
        'datedebut',
        'datefin',
        'id_offres'
    ];

    public function responsable()
    {
        return $this->belongsTo(OffresPers::class, 'id_offres');
    }
}
