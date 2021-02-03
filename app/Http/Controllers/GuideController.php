<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TypeTour;

class GuideController extends Controller
{
    public function index ($regID){

        $guides = User::where([
            ['role_id', '=', 10]
            ])->get();
        $regions = array();
        // $guides = User::all();
       // $regions= json_decode($guides->region_id);

        return view('theme::guides.index', compact('guides','regID','regions'));
    }

    // public function index($regID){
    //     return view('livewire.guides');
    // }

    public function single($id) {
        $guide = User::where('id', '=', $id)->firstOrFail();
        $images = json_decode($guide->images);
        $TypeTour = TypeTour::where('id',"=", $guide->type_tour_id)->value('name');
        return view('theme::guides.single', compact('guide','TypeTour','images'));
    }
}
