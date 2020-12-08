<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{
    public function index( $id){
        $places = Place::where('category_id', '=', $id)->get();

        $seo = [
            'seo_title' => 'Places title',
            'seo_description' => 'Places description'
        ];
        
    	return view('theme::places.index', compact('places', 'seo'));
    }


    public function single( $slug ){

    	$place = Place::where('slug', '=', $slug)->firstOrFail();
        $seo = [
            'seo_title' => $place->name,
            'seo_description' => $place->body,
        ];
        
    	return view('theme::places.single', compact('place', 'seo'));
    }
}
