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
        return view('OffresPERS.editer',compact('offresPers','usecaseDep'));
    }
    public function updateOffrePers(Request $request, $id)
{
        // Trouver l'enregistrement spécifique par son ID
        $offresPers = OffresPers::find($id);

        if (!$offresPers) {
            return redirect()->back()->with('error', 'Offre personnelle non trouvée!');
        }
        // Gérer le téléchargement du fichier photo seulement s'il est présent
        if ($request->hasFile('photos')) {
            $photo = $request->file('photos');
            $photoPath = $photo->store('photosOFfresPers', 'public');

            // Supprimer l'ancienne photo si elle existe
                    if ($offresPers->photos) {
                        $oldPhotoPath = public_path('storage/' . $offresPers->photos);
                        if (file_exists($oldPhotoPath)) {
                            unlink($oldPhotoPath);
                        }
                    }

                // Mettre à jour le chemin de la nouvelle photo
                $offresPers->photos = $photoPath;
            }


            $offresPers->Titre = $request->Titre;
            $offresPers->Profil = $request->Profil;
            $offresPers->Exigence = $request->Exigence;
            $offresPers->Experience = $request->Experience;
            $offresPers->Details =$request->Details;
            $offresPers->Description =$request->Description;

            // Sauvegarder les modifications dans la base de données
            $offresPers->save();

            // Rediriger avec un message de succès
            return redirect()->route('listerROffres')->with('success', 'Offre personnelle mise à jour avec succès!');
}



        public function destroy($id)
        {
               $offresPers = OffresPers::find($id);
               $offresPers->delete();
               return redirect()->route('listerROffres')->with('success', 'Offre Offre a ete supprimer avec success');
        }
}
