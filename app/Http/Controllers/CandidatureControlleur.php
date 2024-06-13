<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Offre;
use App\Models\Candidat;
use App\Models\DossierCandidature;
use Carbon\Carbon;
class CandidatureControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $offres=Offre::find($id);
        return view('Candidature.FormulaireCandidature',compact('offres'));
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
        // Validate the request inputs
        $request->validate([
            'photo' => 'nullable|file|mimes:jpg,png',
            'cv' => 'required|file|mimes:pdf',
            'motivation' => 'required|file|mimes:pdf',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:100',
            'nationalite' => 'required|string|max:100',
            'sexe' => 'required|in:masculine,feminine',
            'situation_matrimoniale' => 'required|in:Celibataire,Marie',
        ]);

        // Get the authenticated user's email
        $userEmail = Auth::user()->email;

        // Check if the candidate has already applied for this offer
        $existingApplication = DB::table('dossier_candidatures')
            ->join('candidats', 'dossier_candidatures.id_candidat', '=', 'candidats.id')
            ->where('candidats.email', $userEmail)
            ->where('dossier_candidatures.id_offre', $offre->id)
            ->exists();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Vous avez déjà postulé pour cette offre.');
        }


        $photoPath = $request->file('photo')->store('photos', 'public');
        $cvPath = $request->file('cv')->store('cvs', 'public');
        $motivationPath = $request->file('motivation')->store('motivations', 'public');

        $candidat = Candidat::create([
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'nationalite' => $request->nationalite,
            'sexe' => $request->sexe,
            'situation_matrimoniale' => $request->situation_matrimoniale,
            'photo' => $photoPath,
            'cv' => $cvPath,
            'motivation' => $motivationPath,
            'email' => $userEmail,
        ]);

        $dossier = DossierCandidature::create([
            'id_offre' => $offre->id,
            'id_candidat' => $candidat->id,
            'datedecreation' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Votre candidature a été reçue avec succès.');
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
