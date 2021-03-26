<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Option extends Model
{
    use HasFactory;
    public function profiles(){
    	return $this->belongsToMany(Profile::class);
    }

    public function parent(){
    	return $this->belongsTo(Option::class);
    }
    public function getProfilesAttached($option_id,$profile_id){
        $asigned = DB::table('option_profile')->where('option_id',$option_id)->where('profile_id',$profile_id);
        return $asigned;
    }
    protected $fillable = [
        'caption',
        'abstract',
        'link',
        'parent_id',
        'target',
        'level',
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
    public function scopeParent_id($query,$value){
        if ($value) {
            return $query->where('parent_id','=',$value);
        }
    }
}
