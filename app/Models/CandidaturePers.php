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
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
    public function dossier()
    {
        return $this->hasOne(DossierDeCandaturePers::class, 'candidatures_id');
    }
    public function diplomes()
    {
        return $this->hasMany(Diplome::class,'candidatures_id');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class,'candidatures_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class,'candidatures_id');
    }
}
