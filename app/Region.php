<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function link(){
    	return url('/region/'  . $this->slug);
    }
}
