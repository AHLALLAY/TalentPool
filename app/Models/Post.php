<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'expired_date', 'operator_id'];
    
    public function applications() {
        return $this->hasMany(Application::class, 'post_id');
    }
    
    public function operator() {
        return $this->belongsTo(Operator::class, 'operator_id');
    }
    
    public function participants() {
        return $this->belongsToMany(Participant::class, 'applications');
    }
}