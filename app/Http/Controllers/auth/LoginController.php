<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

     public function dologin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'])))
         {

            // SI L'UTILISATEUR A UN COMPTE
            $request->session()->regenerate();
            if (auth()->user()->type_utilisateur == 'admin') {
                return redirect()->route('admin.dashbord')->with('message', 'Connexion réussie.');
            }
            if (auth()->user()->type_utilisateur == 'chef') {
                return redirect()->route('chef.dashbord')->with('message', 'Connexion réussie.');
            }
            else {
                return redirect()->route('user.dashbord')->with('message', 'Connexion réussie.');
            }

        } else {
            return redirect()->back()->with('message', 'Erreur.');
        }


    }

     public function doregister(Request $request)
    {
        $this->validate($request, [
            'nom_prenom' => 'required|string',
            'nom_utilisateur' => 'required|string',
            'genre' => 'required|string',
            'email' => 'required|email|unique:users',
            'mdp' => 'required|confirmed',
        ]);

        User::create([
            'nom_prenom' => $request->nom_prenom,
            'nom_utilisateur' => $request->nom_utilisateur,
            'genre' => $request->genre,
            'email' => $request->email,
            'mdp' => Hash::make($request->mdp),
        ]);

        if (Auth::attempt(['email' => $request->email, 'mdp' => $request->mdp])) {
            return redirect()->route('user.dashbord')->with('message', 'Connexion réussie.');
        } else {
            dd('non');
        }

    }


}
