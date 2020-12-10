<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use Wave\Category;
use Wave\User;

class RegionController extends Controller
{
    public function region( $slug){

    	$region = Region::where('slug', '=', $slug)->firstOrFail();
        $categories = Category::all();
        // $user = User::where('id','=','18')->profile($about);
        // $region_user = $user->profile($about);
        // dd($reguserion_user);

        //$place = Place::where('id', '=', '3')->get('location');
        

        
        $seo = [
            'seo_title' => $region->title,
            'seo_description' => $region->seo_description,
        ];
        
    	return view('theme::regions.region', compact('region','categories', 'seo'));
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
