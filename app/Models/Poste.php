<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = ['title', 'type', 'description', 'launch_date', 'expired_date', 'operator'];
}
