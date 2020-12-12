<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{
    public function index($regID, $id){

        
        $places = Place::where([
                                ['category_id', '=', $id],
                                ['location_id','=',$regID],
                                ])->get();
        
        $seo = [
            'seo_title' => 'Places title',
            'seo_description' => 'Places description'
        ];
        
    	return view('theme::places.index', compact('places', 'seo'));
    }


    public function single( $slug ){

        $place = Place::where('slug', '=', $slug)->firstOrFail();
        //dd($place);
        foreach($place->getCoordinates() as $point){
            $center = '{lat:'. $point['lat'].', lng:'.$point['lng'].'}';
        
        };
            
        
        // forelse($place->getCoordinates() as $point){
        //     $center = {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}};
        // }empty {
        //     $center ={lat: {{ config('voyager.googlemaps.center.lat') }}, lng: {{ config('voyager.googlemaps.center.lng') }}};
        // }
        //dd($center);
        
        //$center ='{lat: 51.4501, lng: 31.5234}';
    

        $seo = [
            'seo_title' => $place->name,
            'seo_description' => $place->body,
        ];
        
    	return view('theme::places.single', compact('place','center', 'seo'));
    }
}
