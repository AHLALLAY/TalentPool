<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = ['title', 'description', 'expired_date', 'user_id'];
}
