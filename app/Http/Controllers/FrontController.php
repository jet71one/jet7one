<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Tour;
use Wave\Post;
use Wave\Category;

class FrontController extends Controller
{
    public function aboutUs () {
        return view('about');
    }
    public function support () {
        return view('support');
    }

    public function news () {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        $categories = Category::all();

    	$seo = [
    		'seo_title' => 'Blog',
            'seo_description' => 'Our Blog',
       	];
        return view('news',compact('posts', 'categories', 'seo'));
    }

    public function events () {
        $events = Event::orderBy('created_at', 'DESC')->paginate(6);
        

    	$seo = [
    		'seo_title' => 'Events',
            'seo_description' => 'Our Events',
       	];
        return view('events',compact('events',  'seo'));
    }

    public function hotTour () {
        $tours= Tour::orderBy('created_at', 'DESC')->paginate(6);
        

    	$seo = [
    		'seo_title' => 'Tours',
            'seo_description' => 'Our Tours',
       	];
        return view('hot-tour',compact('tours',  'seo'));
    }

    public function contact () {
        return view('contact');
    }
}
