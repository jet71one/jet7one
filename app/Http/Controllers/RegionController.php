<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Wave\Category;
use Wave\User;
use App\Place;
use App\TypeTour;
use Illuminate\Support\Arr;

class RegionController extends Controller
{
    public function region( $slug){

        $region = Region::where('slug', '=', $slug)->firstOrFail();
        $categories = Category::orderBy('order','asc')->get();
        
        $places = Place::where('location_id', '=', $region->id)->get();

        //Якщо у нас є Супергідв Регіоні
        $guide = User::where([['region_id', '=', $region->id],['role_id', '=', '11']])->first();
        if($guide == null){
            //Якщо у нас в регіоні немає СуперГіда тоді ми беремо звичайного
            //гіда але з цього регіону
            $guide = User::where([['region_id', '=', $region->id]])->first();
                //Якщо у нас немає гідів в цьому регіоні тоді видаємо 
                //повідомлення Немає гідів
                if($guide == null){
                    $guide ='There is no  guide for this region yet';
                    $TypeTour = '';
                    $images = '';
                }
                else{
                    $images = json_decode($guide->images);
                    $TypeTour = TypeTour::where('id',"=", $guide->type_tour_id)->value('name');
                }
           
        }
        else{
            $images = json_decode($guide->images);
            $TypeTour = TypeTour::where('id',"=", $guide->type_tour_id)->value('name');
        }
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
        
        $center = '';
        if($locations[0] !== 0)
            $center = $locations[0];
        else
            $center = '{ lat: 50.024, lng: 30.887 }';
        endif
        $seo = [
            'seo_title' => $region->title,
            'seo_description' => $region->seo_description,
        ];
        
    	return view('theme::regions.region', compact('region','categories','pins','guide','TypeTour', 'seo','images','center'));
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
