<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'email',
        'password',
        'role'
    ];
    public function ufrResponsable()
     {
         return $this->hasOne(Ufr::class, 'responsable_ufr_id');
     }
     public function DepartementResponsable()
     {
         return $this->hasOne(Departement::class, 'responsable_departement_id');
     }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
