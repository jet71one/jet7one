<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Place extends Model
{
    use Spatial;

   

    public function link(){
    	return url('/place/' . $this->slug);
    }
    protected $spatial = ['location'];

}