<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowRegisterForm(){
        return view('auth.register');
    }

    public function Register(Request $request){

        // try = melakukan percobaan
        // catch code kalau try gagal

        try{

            $request -> validate([
                'name'=> 'required|string|max:255',
                'email'=> 'required|string|max:255|unique:users',
                'password'=> 'required|string|min:8',

            ]);
            User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => Hash::make($request -> password),
            ]);
            return redirect()->route('login')->with('success', 'register succesfull.');
        } catch(\Exception $error){
            dump($error-> getMessage());
            return back() -> withErrors($error, key : "An Error has Occured, please check your input again");
        }
    }

    public function ShowLoginForm(){
        return view('auth.login');
    }

    public function Login(Request $request){
        try{
            $request->session()->regenerate();
            $request ->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if(Auth::attempt($request->only('email', 'password'))){
                return redirect()->route('welcome')->with('success', 'login sucess');
            } else {
                dump('login failed, please try again');
                return redirect() -> route('login')->with('error', 'login success');
            }
        } catch(\Exception $error){
            dd($error->getMessage());
            return back() -> withErrors(['error' => "An Error has Occured, please check your input again"]);
        }
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();   
             
        return redirect()->route('login');
    }
}
