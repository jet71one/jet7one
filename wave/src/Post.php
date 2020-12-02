<?php

namespace Wave;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function link(){
    	return url('/blog/' . $this->slug);
    }

    public function image(){
    	return \Voyager::image($this->image);
    }

    public function category(){
    	return $this->belongsTo('Wave\Category');
    }
}
