<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function showLogin(){
        return view('loginPage');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect()->intended(match($user->role){
                'admin' => '/admin/dashboard',
                'formateur' => '/formateur/planning',
                'stagiaire' => '/stagiaire/planning',
                default => '/'
            });
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies sont incorrectes.'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
