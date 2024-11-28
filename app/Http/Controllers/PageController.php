<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VideoGamesList;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
        $VideoGames = VideoGamesList::all();
        return view('welcome', compact('VideoGames'));
    }

    public function create(){
        $categories = Category::all();
        return view('ListVideoGame', compact('categories'));
    }
}
