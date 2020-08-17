<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function aboutUs () {
        return view('about');
    }
    public function support () {
        return view('support');
    }

    public function news () {
        return view('news');
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
