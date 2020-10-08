<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    public function event( $slug){

    	$event = Event::where('slug', '=', $slug)->firstOrFail();

        $seo = [
            'seo_title' => $event->title,
            'seo_description' => $event->seo_description,
        ];
        
    	return view('theme::events.event', compact('event', 'seo'));
    }
}
