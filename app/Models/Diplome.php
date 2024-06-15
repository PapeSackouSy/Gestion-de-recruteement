<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidatures_id',
        'pub_titre',
        'pub_institution',
        'pub_annee',
        'pub_etude',
    ];

    public function application()
    {
        return $this->belongsTo(CandidaturePers::class);
    }
}
