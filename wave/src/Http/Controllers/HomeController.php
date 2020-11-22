<?php

namespace Wave\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Tour;

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
        $tours= Tour::orderBy('created_at', 'DESC')->take(9)->get(); 
          
    	if(setting('auth.dashboard_redirect', true) != "null"){
    		if(!\Auth::guest()){
    			return redirect('dashboard');
    		}
    	}

        $seo = [

            'title'         => setting('site.title', 'Laravel Wave'),
            'description'   => setting('site.description', 'Software as a Service Starter Kit'),
            'image'         => url('/og_image.png'),
            'type'          => 'website'

        ];

        return view('theme::home', compact('seo','events','tours'));
    }
}
