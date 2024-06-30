<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'critere',
        'score',
        'id_user',
        'commission_id'
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'id_user');
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id');
    }
}
