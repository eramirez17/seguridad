<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function users(){
    	return $this->hasMany(User::class);
    }
    public function options(){
    	return $this->belongsToMany(Option::class);
    }
    protected $fillable = [
        'caption',
        'abstract',
    ];
}
