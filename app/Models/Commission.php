<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'mandat',
        'id_departement',
        'date_creation',
        'date_expiration',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
    public function membres()
    {
        return $this->hasMany(Membre::class);
    }
}
