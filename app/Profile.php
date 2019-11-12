<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    // association
    public function user(){

        return $this->belongsTo(User::class);

    }
    public function profileImage(){

        $path = ($this->image) ? '/storage/'.$this->image : '/images/Canva - null.png';
        return $path;
    }
}
