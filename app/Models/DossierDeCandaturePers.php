<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierDeCandaturePers extends Model
{
    use HasFactory;
    protected $fillable = [ 'candidatures_id','offre_id', 'datedecreation'];
    public function candidat()
    {
        return $this->belongsTo(CandidaturePers::class,'candidatures_id');
    }

    public function offre()
    {
        return $this->belongsTo(OffresPers::class,'offre_id');
    }
}
