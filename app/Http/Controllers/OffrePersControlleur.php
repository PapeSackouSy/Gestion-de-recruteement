<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\OffresPers;
use App\Models\DRH;
use App\Models\Avis;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function indexp()
    {
        $offres = OffresPers::where('is_published', true)->get(); // Filtrer les offres publiées
        return view('OffresPERS.AfficherOffrePerstop', compact('offres'));
    }

    // Méthode pour publier une offre
    public function publish($id)
    {
        $offre = OffresPers::find($id);
        $offre->is_published = true; // Assurez-vous que vous avez ce champ dans votre modèle
        $offre->save();

        return redirect()->route('affichierPub', $offre->id)
            ->with('success', 'Offre publiée avec succès');
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
