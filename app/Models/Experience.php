<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidatures_id',
        'exp_titre',
        'nom',
        'duree',
        'ex_description',
    ];

    public function application()
    {
        return $this->belongsTo(CandidaturePers::class);
    }
}
