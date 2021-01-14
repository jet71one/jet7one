<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
use App\TypeTour;

class Users extends Component
{
    public $amount = 10;
    
    public function render()
    {
        $users = User::take($this->amount)->get();
        
        // $guides = User::where([
        //     ['region_id', '=', $regID]
        //     ])->get();
        // dd($guides);
        dd($users);
        // $TypeTour = TypeTour::where('id',"=", $guides[0]['type_tour_id'])->value('name');
        return view('livewire.guides');
    }

    public function load()
    {
        $this->amount += 10;
    }
}
