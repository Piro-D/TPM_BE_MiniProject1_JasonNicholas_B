<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Mail\MyEmail;
use App\Models\VideoGamesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{
    public function StoreVideoGame(Request $request){

        $request ->validate([
            'GameTitle' => 'required|min:3',
            'Developer'=> 'required|min:3',
            'ReleaseDate' => 'required|date',
            'PlayedSince' => 'required|date',
            'Genre'=> 'required|min:2',
            'image' => 'required|mimes:png,jpg'
        ]);

        $filepath = public_path('storage/images');
        $file = $request->file('image');
        $filename = $request->GameTitle.'-'. $request->Developer."-". $file->getClientOriginalName();
        $file->move($filepath, $filename);

        VideoGamesList::create([
            'GameTitle' => $request -> GameTitle ,
            'Developer' => $request -> Developer,
            'ReleaseDate' => $request -> ReleaseDate,
            'PlayedSince' => $request -> PlayedSince,
            'image' => $filename,
            'Genre' => $request -> Genre,
            'Status' => $request -> Status,
            'Category_id' => $request->PlatformType,
        ]);
        
        Mail::to('user@gmail.com')->send(new MyEmail([
            'GameTitle' => $request -> GameTitle,
            'Developer' => $request -> Developer,
            'ReleaseDate' => $request -> ReleaseDate,
            'PlayedSince' => $request -> PlayedSince,
            'Genre' => $request -> Genre,
        ]));

        return redirect(route('welcome'));
    }

    public function welcome(){
        $VideoGames = VideoGamesList::all();
        return view('welcome', compact('VideoGames'));
    }


    public function create(){

        $categories = Category::all();
        return view('ListVideoGame', compact('categories'));
    }

    public function edit($id, Request $request){
        $VideoGame = VideoGamesList::findOrFail($id);
        $categories = Category::all();

        return view('EditVideoGame', compact('VideoGame', 'categories'));
    }

    public function UpdateList($id, Request $request){
        $VideoGame = VideoGamesList::findOrFail($id);
        $VideoGames = VideoGamesList::all();

        $request ->validate([
            'GameTitle' => 'required|min:3',
            'Developer'=> 'required|min:3',
            'ReleaseDate' => 'required|date',
            'PlayedSince' => 'required|date',
            'Genre'=> 'required|min:2',
            'image' => 'required|mimes:png,jpg'
        ]);


        $filepath = public_path('storage/images');
        $file = $request->file('image');
        $filename = $request->GameTitle.'-'. $request->Developer."-". $file->getClientOriginalName();
        $file->move($filepath, $filename);

        $VideoGame->update([
            'GameTitle' => $request -> GameTitle ,
            'Developer' => $request -> Developer,
            'ReleaseDate' => $request -> ReleaseDate,
            'PlayedSince' => $request -> PlayedSince,
            'Genre' => $request -> Genre,
            'image' => $filename,
            'Status' => $request -> Status,
            'Category_id' => $request->PlatformType,
        ]);
        // return view('welcome', compact( 'VideoGames'));
        return redirect()->route('welcome');
    }

    public function DeleteGame ($id){
        // VideoGamesList::destroy($id);
        // cara gampangnya

        $VideoGame = VideoGamesList::findOrFail($id);
        $VideoGame -> delete();
        return redirect() -> route('welcome');
    }
}
