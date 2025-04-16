<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = ['name','email','password','roles',];
    protected $hidden = ['password','remember_token',];
    protected function casts(){ return ['email_verified_at' => 'datetime','password' => 'hashed',];}

    public function operator() {
        return $this->hasOne(Operator::class, 'operator_id', 'id');
    }
    
    public function participant() {
        return $this->hasOne(Participant::class, 'participant_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
