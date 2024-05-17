<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable = ['titre','description','image','Status','id_departement'];
    public function responsable()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}
