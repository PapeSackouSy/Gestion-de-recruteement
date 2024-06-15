<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidaturePers extends Model
{
    use HasFactory;
    protected $fillable = [
        'cv',
        'lettre',
        'datenaissance',
        'these',
    ];

    public function diplomes()
    {
        return $this->hasMany(Diplome::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}