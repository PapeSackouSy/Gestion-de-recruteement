<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierDeCandidature extends Model
{
    use HasFactory;
    protected $fillable = ['id_Offre', 'id_candidat'];
    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
