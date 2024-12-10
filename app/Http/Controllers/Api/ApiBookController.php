<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\VideoGamesList;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function index(){
        $VideoGames = VideoGamesList::all();
        return response() -> json([
            'success' => true, 
            'GameData'=> $VideoGames], 
            200);
    }

    public function save(Request $request){
        $Game = New VideoGamesList();

        try{
            $Game -> GameTitle = $request->GameTitle;
            $Game -> Developer = $request->Developer;
            $Game -> ReleaseDate = $request->ReleaseDate;
            $Game -> PlayedSince = $request->PlayedSince;
            $Game -> image = $request->image;
            $Game -> Genre = $request->Genre;
            // $Game -> Category_id = $request->Category_id;

            $category = Category::find($request->Category_id);

            // Check if category exists
            if (!$category) {
                return response()->json(['error' => 'Category not found'], 404);
            }

            // Associate the category with the Game
            $Game->category()->associate($category);

            $Game->save();

        }catch(\Exception $error){
            return response() -> json(['error' => $error -> getMessage()], 500);
        }

        return response() -> json([
            'success' => true,
            'BookData' => $Game,
        ]);
    }

    public function update ($id, Request $request){
        $GameUpdate = VideoGamesList::find($id);

        $GameUpdate -> GameTitle = $request->GameTitle;
        $GameUpdate -> Developer = $request->Developer;
        $GameUpdate -> ReleaseDate = $request->ReleaseDate;
        $GameUpdate -> PlayedSince = $request->PlayedSince;
        $GameUpdate -> Genre = $request->Genre;

        $GameUpdate-> save();

        return response() -> json([
            'success' => true,
            'message' => 'Game has been updated',
            'newGameData' => $GameUpdate,
        ], 200);
    }

    public function delete($id){
        $GameDelete = VideoGamesList::find($id);
        $GameDelete -> delete();

        return response() -> json([
            'success' => true,
            'message' => 'Game has been deleted',
        ], 200);
    }
}
