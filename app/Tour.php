<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    public function link(){
    	return url('/tour/'  . $this->slug);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tour');
    }

}
