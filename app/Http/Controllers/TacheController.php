<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "TOUS LES TACHES";
        $equipes = Equipe::get();
        $users = User::get();
        $projets = Projet::get();
        $taches = Tache::get();
        return view('admin.projet.taches.index', compact('title', 'equipes', 'users', 'projets', 'taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "NOUVELLE TACHE";
        return view('admin.projet.taches.create', compact('title'));
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
            'projet_id' => '',
            'libelle' => '',
            'duree' => '',
            'executand_id' => '',
            'etat' => '',
            'equipe_id' => '',
        ]);

        // dd($donnee);

        Tache::create($donnee);

        return redirect()->back()->with('message', 'Tâche ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show(Tache $tache)
    {
        //
        $title = "DETAILS";
        return view('admin.projet.show', $tache);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function edit(Tache $tache)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tache $tache)
    {
        //
        dd($tache);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tache $tache)
    {
        //
    }
}
