<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Application extends Model
{
    protected $fillable = ['post_id', 'participant_id'];
    
    public function participant() {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
    
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
