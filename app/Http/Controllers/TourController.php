<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;
use App\Place;
use App\Region;

class TourController extends Controller
{

    public function tour( $slug){

      	$tour = Tour::where('slug', '=', $slug)->firstOrFail();
        $place = Place::where('id', '=', $tour->location_id)->get();
        $region = Region::where('id', '=', $tour->location_id)->first();

        $seo = [
            'seo_title' => $tour->title,
            'seo_description' => $tour->seo_description,
        ];

    	return view('theme::tours.tour', compact('tour', 'seo', 'region'));
    }

}
