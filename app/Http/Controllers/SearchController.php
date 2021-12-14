<?php

namespace App\Http\Controllers;

use App\Region;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autocomplete(Request $request) {

        $limit = 12;

        $searchResult = [];

        $word = $request->word;

        $regions = Region::where('name', 'LIKE', "%{$word }%")->limit(6)->get();

        $limit = $limit - $regions->count();

        foreach ($regions as $region) {
            $searchResult['regions'][] = [
                'name' => $region->name,
                'url' => route('region.event-region', ['slug' => $region->slug])
            ];
        }

        $guides = User::whereIn('role_id', [10, 11, 12])->where('name', 'LIKE', "%{$word }%")->select('id', 'name')->limit($limit)->get();

        foreach ($guides as $guide) {
            $searchResult['guides'][] = [
                'name' => $guide->name,
                'url' => route('region.guide-single', ['id' => $guide->id])
            ];
        }

        return response()->json($searchResult);
    }
}
