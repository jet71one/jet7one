<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    public function link(){
    	return url('/guide/' . $this->id);
    }
}
