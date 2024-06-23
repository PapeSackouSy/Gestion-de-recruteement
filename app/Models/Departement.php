<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = ['nom','responsable_departement_id','id_ufr'];
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_departement_id');
    }
    public function ufrcles()
    {
        return $this->belongsTo(Ufr::class, 'id_ufr');
    }
    public function posts()
    {
        return $this->hasMany(OffresPers::class);
    }
    public function Commmission()
    {
        return $this->hasMany(Commission::class);
    }
}
