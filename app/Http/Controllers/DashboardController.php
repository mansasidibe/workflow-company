<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashbord_admin()
    {
        $title = "DASHBOARD ADMINISTRATEUR";
        $users = User::get();
        $users_homme = User::where('genre', 'H')->get();
        $users_femme = User::where('genre', 'F')->get();
        $equipes = Equipe::get();
        return view('admin.dashboard', compact('title', 'users','users_homme', 'users_femme','equipes'));
    }

    public function dashbord_chef()
    {
        $title = "DASHBOARD CHEF PROJET";
        $users = User::get();
        $equipes = Equipe::get();
        return view('chef-equipe.dashboard', compact('title', 'users','equipes'));
    }

    public function dashbord_user()
    {
        // dd(Auth::user());
         $title = "DASHBOARD EMPLOYE";
        $equipes = Equipe::get();
        $taches = Tache::get();
        return view('user.dashboard', compact('title', 'taches','equipes'));
    }
}
