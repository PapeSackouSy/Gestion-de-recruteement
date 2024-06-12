<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\OffresPers;
use App\Models\DRH;
use App\Models\Avis;
use PDF;
use Illuminate\Support\facades\Auth;
class OffrePersControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usecaseDep=Departement::all();
        return view('OffresPERS.OffresPers',compact('usecaseDep'));
    }
/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $departement = Departement::where('responsable_departement_id', $userId)->first();

        if ($departement) {
            $idDepartement = $departement->id;
            $offrespers = OffresPers::where('departement_id', $idDepartement)->get();
        } else {
            $offrespers = collect(); // Renvoie une collection vide si aucun département n'est trouvé
        }
        $usecaseDep=Departement::all();
        return view('OffresPERS.Afficher',compact('offrespers','usecaseDep'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function indexp()
    {
        $offrespers = OffresPers::where('is_published', true)->get(); // Filtrer les offres publiées
        return view('Offre.AfficherOffre', compact('offrespers'));
    }

    public function publish($id)
    {
            $post = OffresPers::find($id);
            $post->is_published=true;
            $post->save();
            return redirect()->back()->with('success', 'Offre publiée avec succès');
    }
     public function store(Request $request)
     {

         $validatedData = $request->validate([
             'photos' => 'nullable|file|mimes:jpg,png',
             'Titre' => 'required|string',
             'Profil' => 'required|string',
             'Exigence' => 'required|string',
             'Experience' => 'required|string',
             'Details' => 'required|string',
             'Description' => 'required|string|max:12345',
         ]);

         $userId = Auth::id();
         $departement = Departement::where('responsable_departement_id', $userId)->first();
         $idDepartement = $departement->id;
         $photoPath = $request->file('photos')->store('photosOFfresPers', 'public');
         $offresPers = new OffresPers();
         $offresPers->photos=$photoPath;
         $offresPers->Titre = $validatedData['Titre'];
         $offresPers->Profil = $validatedData['Profil'];
         $offresPers->Exigence = $validatedData['Exigence'];
         $offresPers->Experience = $validatedData['Experience'];
         $offresPers->Details = $validatedData['Details'];
         $offresPers->Description = $validatedData['Description'];
         $offresPers->departement_id=$idDepartement ;
         $offresPers->save();
        return redirect()->back()->with('success', 'Offre ajoutée avec succès!');
     }


    public function show()
    {
        $offresPers=OffresPers::all();
        $usecaseDRH=DRH::all();
        return view('OffresPERS.AfficherOffrePers',compact('offresPers','usecaseDRH'));
    }
    public function edit($id)
    {
        $offre = OffresPers::find($id);
        if (!$offre) {

            return redirect()->back()->with('error', 'Offre non trouvée.');
        }
        $data = ['offre' => $offre];
        $pdf = PDF::loadView('Offre.AvisdeRecrutement', $data);
        return $pdf->download('AvisdeRecrutement.pdf');
    }
    public function showEditer($id)
    {
        $offresPers=OffresPers::find($id);
        $usecaseDep=Departement::all();
        return view('OffresPERS.AfficherOffrePers',compact('offresPers','usecaseDep'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'photos' => 'nullable|file|mimes:jpg,png',
            'Titre' => 'required|string',
            'Profil' => 'required|string',
            'Exigence' => 'required|string',
            'Experience' => 'required|string',
            'Details' => 'required|string',
            'Description' => 'required|string|max:12345',
        ]);

        $userId = Auth::id();
        $departement = Departement::where('responsable_departement_id', $userId)->first();
        $idDepartement = $departement->id;
        $photoPath = $request->file('photos')->store('photosOFfresPers', 'public');
        $offresPers = OffresPers::find($request->id);
        $offresPers->photos=$photoPath;
        $offresPers->Titre = $validatedData['Titre'];
        $offresPers->Profil = $validatedData['Profil'];
        $offresPers->Exigence = $validatedData['Exigence'];
        $offresPers->Experience = $validatedData['Experience'];
        $offresPers->Details = $validatedData['Details'];
        $offresPers->Description = $validatedData['Description'];
        $offresPers->departement_id=$idDepartement ;
        $offresPers->save();
       return redirect()->route('listerROffres')->with('success', 'Offre modifier avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
