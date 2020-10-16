<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class TourController extends Controller
{
    
    public function tour( $slug){

    	$tour = Tour::where('slug', '=', $slug)->firstOrFail();

        $seo = [
            'seo_title' => $tour->title,
            'seo_description' => $tour->seo_description,
        ];
        
    	return view('theme::tours.tour', compact('tour', 'seo'));
    }

}
