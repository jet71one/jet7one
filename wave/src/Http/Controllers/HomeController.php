<?php

namespace Wave\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Region;
use Wave\Post;

class HomeController extends \App\Http\Controllers\Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = Event::orderBy('created_at', 'DESC')->take(3)->get();
        $news = Post::orderBy('created_at', 'DESC')->take(3)->get();

        $blues= Region::where('color', '=','blue')->orderBy('created_at', 'DESC')->take(9)->get(); 
        $roses= Region::where('color', '=','rose')->orderBy('created_at', 'DESC')->take(9)->get(); 
        $dark_blues= Region::where('color', '=','dark-blue')->orderBy('created_at', 'DESC')->take(9)->get(); 
          
    	if(setting('auth.dashboard_redirect', true) != "null"){
    		if(!\Auth::guest()){
    			return redirect('dashboard');
    		}
    	}

        $seo = [

            'title'         => setting('site.title', ' Jet7One - Your tour guide fashion models'),
            'description'   => setting('site.description', ' Jet7One - Your tour guide fashion models'),
            'image'         => url('/og_image.png'),
            'type'          => 'website'

        ];

        return view('theme::home', compact('seo','events','blues','roses','dark_blues','news'));
    }
}
