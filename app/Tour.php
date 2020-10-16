<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    public function link(){
    	return url('/tour/'  . $this->slug);
    }
}
