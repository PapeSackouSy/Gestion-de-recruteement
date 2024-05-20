<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
class OffreControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Offre.Offre');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function store(Request $request)
{
    $request->validate([
        'libelle' => 'required|string',
        'profil_poste' => 'required|string',
        'diplomes_requis' => 'required|string',
        'experience_professionnelle' => 'required|string',
        'details' => 'required|string',
        'description' => 'required|string',
        'profils_competences' => 'required|string',
        'composition_dossier' => 'required|string',
        'depot_candidature' => 'required|string',
        'status' => 'required|string',
        'Date_open' => 'nullable|date',
        'Date_close' => 'nullable|date',
    ]);

    $offre = new Offre();
    $offre->libelle = $request->input('libelle');
    $offre->profil_poste = $request->input('profil_poste');
    $offre->diplomes_requis = $request->input('diplomes_requis');
    $offre->experience_professionnelle = $request->input('experience_professionnelle');
    $offre->details = $request->input('details');
    $offre->description = $request->input('description');
    $offre->profils_competences = $request->input('profils_competences');
    $offre->composition_dossier = $request->input('composition_dossier');
    $offre->depot_candidature = $request->input('depot_candidature');
    $offre->status = $request->input('status');
    $offre->Date_open = $request->input('Date_open');
    $offre->Date_close = $request->input('Date_close');
    $offre->save();

    return redirect()->route('dash')->with('success', 'Offre ajoutée avec succès!');
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $offres = Offre::all();
        return view('Offre.ListerOffre', compact('offres'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offres=Offre::find($id);
        return view('Offre.AvisdeRecrutement',compact('offres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
