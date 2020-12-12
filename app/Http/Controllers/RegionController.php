<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Wave\Category;
use Wave\User;
use App\Place;
use Illuminate\Support\Arr;

class RegionController extends Controller
{
    public function region( $slug){

    	$region = Region::where('slug', '=', $slug)->firstOrFail();
        $categories = Category::all();
        
        $places = Place::where('location_id', '=', $region->id)->get();
        //Беремо всі точки і додаємо їх в масив
        //щоб їх додати проходимось циклом по точкам
        //потім конвертуємо це в строку і передаємо в карту
        $locations = array();
        foreach($places as $place){
            
            foreach($place->getCoordinates() as $point){
                array_push($locations, '{lat: '. $point['lat'].', lng: '.$point['lng'].'}');
            };
        };
        $pins ='';
        $pins =implode(',', $locations);
        
        $seo = [
            'seo_title' => $region->title,
            'seo_description' => $region->seo_description,
        ];
        
    	return view('theme::regions.region', compact('region','categories','pins', 'seo'));
    }
    
    public function category($slug){
        
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('created_at', 'DESC')->paginate(6);
        $categories = Category::all();

        $seo = [
            'seo_title' => $category->name . '- Blog',
            'seo_description' => $category->name . '- Blog',
        ];

        return view('theme::blog.index', compact('posts', 'category', 'categories', 'seo'));
    }


}
