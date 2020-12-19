<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GuideController extends Controller
{
    public function index ($regID){

        $guides = User::where([
            ['region_id', '=', $regID]
            ])->get();
       // dd($guides);
        return view('theme::guides.index', compact('guides'));
    }
}
