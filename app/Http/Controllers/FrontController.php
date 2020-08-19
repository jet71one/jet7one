<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('events');
    }

    public function hotTour () {
        return view('hot-tour');
    }

    public function contact () {
        return view('contact');
    }
}
