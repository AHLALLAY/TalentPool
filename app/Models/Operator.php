<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "operators_info";
    protected $fillable = ['company', 'position', 'contact_email', 'operator_id'];
    
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
