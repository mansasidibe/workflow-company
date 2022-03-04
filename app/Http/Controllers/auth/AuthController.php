<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $title = "CONNEXION";
        return view('auth.login', compact('title'));
    }

    public function dologin(Request $request)
    {
        dd('ok');
    }

    public function doregister(Request $request)
    {
        dd('ok');
    }
}
