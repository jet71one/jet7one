<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function link(){
    	return url('/events/'  . $this->slug);
    }
    public function image(){
    	return \Voyager::image($this->image);
    }
}
