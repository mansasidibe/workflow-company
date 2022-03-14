<?php

namespace App\Http\Controllers;

use App\Models\Empechement;
use App\Models\Projet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmpechementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "TOUS LES EMPECHEMENTS";
        $empechements = Empechement::where('created_at', '>=', Carbon::now()->subDay())->latest()->get();
        $tous_empechement = Empechement::get();
        $projets = Projet::get();
        return view('empechement.index', compact('title', 'empechements', 'tous_empechement', 'projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "DECLARER UN EMPECHEMENT";
        $projets = Projet::get();
        return view('empechement.create', compact('title', 'projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $donnee = $this->validate($request, [
            'titre' => '',
            'file' => '',
            'raison' => '',
            'user_id' => '',
        ]);

        $empechement = Empechement::create($donnee);
        if ($empechement) {
            return redirect()->back()->with('message', 'Votre rêquete a bien été envoyé.');
        } else {
            return redirect()->back()->with('message', 'Votre rêquete n\'a pas été envoyé, veuillez vérifier vos information et réessayer.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empechement  $empechement
     * @return \Illuminate\Http\Response
     */
    public function show(Empechement $empechement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empechement  $empechement
     * @return \Illuminate\Http\Response
     */
    public function edit(Empechement $empechement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empechement  $empechement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empechement $empechement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empechement  $empechement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empechement $empechement)
    {
        //
    }
}
