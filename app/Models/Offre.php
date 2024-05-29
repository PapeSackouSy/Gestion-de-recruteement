<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    public function getPhotoUrlAttribute()
    {
          return $this->photos ? asset('storage/offre_photos/' . $this->photos) : null;
    }
}
