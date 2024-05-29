<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierCandidature extends Model
{
    use HasFactory;
    protected $fillable = [ 'id_offre','id_candidat', 'datedecreation'];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
