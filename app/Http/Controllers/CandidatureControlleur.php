<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Offre;
use App\Models\Candidat;
use App\Models\DossierDeCandidature;
class CandidatureControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Offre $offre)
    {
        $validated = $request->validate([
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string|max:255',
            'nationalite' => 'nullable|string|max:255',
            'sexe' => 'nullable|string|max:10',
            'situation_matrimoniale' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'required|mimes:pdf|max:2048',
            'motivation' => 'required|mimes:pdf|max:2048',
        ]);
        $photoName = null;
        $cvName = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time(). '.'. $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/photos'), $photoName);
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time(). '.'. $cv->getClientOriginalExtension();
            $cv->move(public_path('storage/cvs'), $cvName);
        }
        if ($request->hasFile('motivation')) {
            $motivation = $request->file('motivation');
            $motivationName = time(). '.'. $motivation->getClientOriginalExtension();
            $motivation->move(public_path('storage/cvs'), $motivationName);
        }

        // Create a new Candidat model instance
        $candidat = new Candidat();
        $user=Auth::user();
        // Set the model attributes
        $candidat->nom =$user->nom;
        $candidat->prenom =$user->prenom;
        $candidat->email =$user->email;
        $candidat->telephone = $user->telephone;
        $candidat->adresse =$user->adresse;
        $candidat->photo = $photoName;
        $candidat->cv = $cvName;
        $candidat->motivation = $motivationName;
        $candidat->date_naissance = $request->input('date_naissance');
        $candidat->lieu_naissance = $request->input('lieu_naissance');
        $candidat->nationalite = $request->input('nationalite');
        $candidat->sexe = $request->input('sexe');
        $candidat->situation_matrimoniale = $request->input('situation_matrimoniale');


        $candidat->save();

        // Redirect to the candidat index page
        return redirect()->route('layout')->with('success', 'Candidat created successfully!');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
