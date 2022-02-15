<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function features(){
        return $this->belongsToMany(Feature::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }


    public function getTitleAttribute($value){
        return Str::words($value,5);
    }

    public function setSlugAttribute($value){
        return $this->attributes['slug'] = Str::slug($value);
    }
}
