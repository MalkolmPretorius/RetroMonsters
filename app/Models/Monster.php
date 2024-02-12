<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function notations()
    {
        return $this->hasMany(Notation::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function rarety()
    {
        return $this->belongsTo(Rarety::class);
    }
    
    
}
