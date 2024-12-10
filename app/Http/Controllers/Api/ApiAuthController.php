<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiAuthController extends Controller
{
    public function Register(Request $request){
        

        $Data = [
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password, 
        ];

        try{
            $user = User::create($Data);
        } catch (\Exception $error){
            // return response()->json([]);
            return response(['error'=>$error->getMessage()], 500 ); 
        }

        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['user'=>$user, 'accesstoken'=>$token], 201);
    }

    public function Login (Request $request){

        $LoginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Find the user by email
        $user = User::where('email', $LoginData['email'])->first();
    
        // Verify the password
        if (!$user || !Hash::check($LoginData['password'], $user->password)) {
            return response()->json(['error' => 'Your credentials are not valid'], 401);
        }
    
        // Generate API token using Passport
        $token = $user->createToken('MyApp')->accessToken;
    
        return response()->json([
            'user' => $user,
            'access_token' => $token,
        ], 200);
    }
}
