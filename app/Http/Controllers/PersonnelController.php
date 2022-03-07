<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    //

    public function presence()
    {
        $title =' PRESENCE';
        return view('admin.personnel.presence', compact('title'));
    }
}
