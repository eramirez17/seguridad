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
    public function scopeId($query,$value){
        if ($value) {
            return $query->where('id','=',$value);
        }
    }
    public function scopeCaption($query,$value){
        if ($value) {
        return $query->where('caption','like',"%$value%") ;
        }
    }
    public function scopeAbstract($query,$value){
        if ($value) {
            return $query->where('abstract','like',"%$value%");
        }
    }
}
