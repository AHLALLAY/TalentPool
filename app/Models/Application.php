<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Application extends Model
{
    protected $fillable = ['post_id', 'participant_id', 'status'];
    
    public function participant() {
        return $this->belongsTo(Participant::class);
    }
    
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
