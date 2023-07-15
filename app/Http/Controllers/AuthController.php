<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginView(){
        return view('auth.login');
    }

    public function registerView(){
        return view('auth.register');
    }

    public function register(Request $request){
        try {
            $validated = $request->validate([
                'firstname' => 'required|max:20',
                'lastname' => 'required|max:20',
                'username' => 'required|unique:users',
                'email' => 'required|email',
                'password' => 'required|confirmed'       
            ]);

            $validated['password'] = bcrypt($validated['password']);
            $user = User::create($validated);

            Auth()->login($user);

            return redirect("/");
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function login(Request $request){
        try {
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect('/');
            }
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
    }
}
