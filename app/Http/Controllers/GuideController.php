<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TypeTour;

class GuideController extends Controller
{
    public function index ($regID){

        $guides = User::where([
            ['region_id', '=', $regID]
            ])->get();
       
        $TypeTour = TypeTour::where('id',"=", $guides[0]['type_tour_id'])->value('name');
      //  dd($TypeTour);
        return view('theme::guides.index', compact('guides','TypeTour'));
    }

    public function single($id) {
        $guide = User::where('id', '=', $id)->firstOrFail();
        $images = json_decode($guide->images);
        $TypeTour = TypeTour::where('id',"=", $guide->type_tour_id)->value('name');
        return view('theme::guides.single', compact('guide','TypeTour','images'));
    }
}
