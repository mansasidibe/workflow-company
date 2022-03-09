<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Projet;
use App\Models\Tache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "TOUS LES PROJETS";
        $projets = Projet::get();
        $taches = Tache::get();
        $equipes = Equipe::get();
        Carbon::setLocale('fr');

        return view('admin.projet.index', compact('title', 'projets', 'taches', 'equipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "CREATION PROJETS";
        return view('admin.projet.create', compact('title'));
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
            'nom' => '',
            'date_debut' => '',
            'duree' => '',
            'equipe_id' => '',
        ]);

        // dd($donnee);
        $projet = new Projet();

        $projet->nom = $request->input('nom');
        $projet->date_debut = $request->input('date_debut');
        $projet->duree = $request->input('duree');
        $projet->equipe_id = $request->input('equipe_id');
        $projet->etat = $request->input('etat');
        // $projet->user_id = Auth()->user()->id;
        $projet->save();

        return redirect()->back()->with('message', 'Projet ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        //
        $title = "DETAILS";
        return view('admin.projet.show', compact('projet', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //
         $donnee = $this->validate($request, [
            'nom' => '',
            'date_debut' => '',
            'duree' => '',
            'equipe_id' => '',
            'etat'  => '',
        ]);

        $projet->nom = $request->input('nom');
        $projet->date_debut = $request->input('date_debut');
        $projet->duree = $request->input('duree');
        $projet->equipe_id = $request->input('equipe_id');
        $projet->etat = $request->input('etat');
        // $projet->user_id = Auth()->user()->id;
        $projet->update();

        return redirect()->back()->with('message', 'Projet mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        //
        // dd($projet);
        $projet->delete();
        return response()->json(['message' => 'Projet archivé avec succès']);
    }
}
