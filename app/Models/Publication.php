<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidatures_id',
        'titre',
        'annee',
        'journal',
        'lien',
    ];

    public function application()
    {
        return $this->belongsTo(CandidaturePers::class);
    }
}
