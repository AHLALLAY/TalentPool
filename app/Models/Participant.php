<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants_info';
    protected $fillable = ['cv', 'motiv', 'participant_id'];
    
    public function posts() {
        return $this->belongsToMany(Post::class, 'applications');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'participant_id', 'id');
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
