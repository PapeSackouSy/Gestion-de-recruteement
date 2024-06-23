<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'role',
        'commission_id',
        'email',
        'telephone'
    ];


    public function commission()
    {
        return $this->belongsTo(Commission::class);
    }
}
