<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['phone', 'cv', 'moti_letter', 'user_id'];

}
