<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ufr extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'responsable_ufr_id'];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_ufr_id');
    }
    public function posts()
    {
        return $this->hasMany(Departement::class);
    }
}
