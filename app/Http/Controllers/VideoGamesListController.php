<?php

namespace App\Http\Controllers;
use App\Models\VideoGamesList;


use Illuminate\Http\Request;

class VideoGamesListController extends Controller
{
    public function StoreVideoGame(Request $request){
        VideoGamesList::create([
            'GameTitle' => $request -> GameTitle ,
            'Developer' => $request -> Developer,
            'ReleaseDate' => $request -> ReleaseDate,
            'PlayedSince' => $request -> PlayedSince,
            'Genre' => $request -> Genre,
            'Status' => $request -> Status,
            'Category_id' => $request->PlatformType,
        ]);

        return redirect(route('welcome'));
    }
}
