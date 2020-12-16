<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use TCG\Voyager;
class Event extends Model
{
    public function link(){
    	return url('/events/'  . $this->slug);
    }

    public function showImage(){
    	return \Voyager::image($this->image);
    }
}
