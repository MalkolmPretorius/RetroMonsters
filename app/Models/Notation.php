<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notation extends Model
{
    protected $table = "notations";
    protected $fillable = ['notation','user_id','monster_id'];
    protected $primaryKey = 'monster_id';

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function monster()
    {
        return $this->belongsTo(Monster::class);
    }
}
