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
}
