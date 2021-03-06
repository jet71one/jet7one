<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Wave\Category;
use Wave\User;
use App\Place;
use App\Tour;
use App\TypeTour;
use Illuminate\Support\Arr;
use Namshi\JOSE\Signer\OpenSSL\HS512;

class RegionController extends Controller
{
    public function region( $slug){

        $region = Region::where('slug', '=', $slug)->firstOrFail();
        $categories = Category::orderBy('order','asc')->get();

        $tours = Tour::where('type', 10)->where('location_id', $region->id)->orderBy('created_at', 'DESC')->get();


        $places = Place::where('location_id', '=', $region->id)->get();
        $user = User::firstOrFail();
        $regions= json_decode($user->region_id);
        //dd(in_array(2,$regions));
        //як перевірити всіх гідів які нам мають такий регіон
        //Якщо у нас є Супергідв Регіоні
        $guide = User::where('role_id', '=', '11')->get();
        // dd($guide);



        // if($guide == null){
        //     //Якщо у нас в регіоні немає СуперГіда тоді ми беремо звичайного
        //     //гіда але з цього регіону
        //     $guide = User::where([['region_id', '=', $region->id]])->first();
        //         //Якщо у нас немає гідів в цьому регіоні тоді видаємо
        //         //повідомлення Немає гідів
        //         if($guide == null){
        //             $guide ='There is no  guide for this region yet';
        //             $TypeTour = '';
        //             $images = '';
        //         }
        //         else{
        //             $images = json_decode($guide->images);
        //             $TypeTour = TypeTour::where('id',"=", $guide->type_tour_id)->value('name');
        //         }

        // }
        // else{
        //     $images = json_decode($guide->images);
        //     $TypeTour = TypeTour::where('id',"=", $guide->type_tour_id)->value('name');
        // }




        //Беремо всі точки і додаємо їх в масив
        //щоб їх додати проходимось циклом по точкам
        //потім конвертуємо це в строку і передаємо в карту
        $info = array();
        $locations = array();

        foreach($places as $place){
            foreach($place->getCoordinates() as $point){
                // array_push($locations, '{ placeName: '. '`'. $place->name .'`' .',  LatLng: [{lat: '. $point['lat'].', lng: '.$point['lng'].'}]}');
                array_push($locations, '[ `'.$place->name.'`,' .$point['lat'].','.$point['lng'].',`'.$place->link().' `]');
                array_push($info, "[<div class=\"info_content\">ww</div> ]");
            };
        };
        // <a href="'.$place->link() .' " class="info-content"> '.$place->name .'</a>


        // dd($locations);
        // dd($info);
        $info = json_encode($info);
        $pins ='';
        $pins =implode(',', $locations);
        // $info =implode(',', $info);
        // dd($pins);
        // $names =implode('""', $names);

        $center = '';
        if($locations == null){
            $center = '{ lat: 50.024, lng: 30.887 }';

        }else{
            $center = $locations[0];
        }

        $seo = [
            'seo_title' => $region->title,
            'seo_description' => $region->seo_description,
        ];

    	return view('theme::regions.region', compact('region','categories','pins','places','info','guide', 'seo','center', 'tours'));
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
