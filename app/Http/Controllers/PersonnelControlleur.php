<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Diplome;
use App\Models\Publication;
use App\Models\Experience;
use App\Models\candidaturePers;
use App\Models\DossierDeCandaturePers;
use App\Models\OffresPers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\facades\Auth;
class PersonnelControlleur extends Controller
{
    public function Afficher($id)
    {
        $candidaturePers = OffresPers::find($id);
        return view('CandidaturePers.Formulaire',compact('candidaturePers'));
    }


    public function store(Request $request,OffresPers $offre)
    {

        $validatedData = $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'lettre' => 'required|file|mimes:pdf,doc,docx',
            'datenaissance' => 'required|date',
            'pub_titre' => 'nullable|array',
            'pub_titre.*' => 'string|max:255',
            'pub_institution' => 'nullable|array',
            'pub_institution.*' => 'string|max:255',
            'pub_annee' => 'nullable|array',
            'pub_annee.*' => 'integer|digits:4',
            'pub_etude' => 'nullable|array',
            'pub_etude.*' => 'string|max:255',
            'these' => 'required|file|mimes:pdf,doc,docx',
            'titre' => 'nullable|array',
            'titre.*' => 'string|max:255',
            'annee' => 'nullable|array',
            'annee.*' => 'integer|digits:4',
            'journal' => 'nullable|array',
            'journal.*' => 'string|max:255',
            'lien' => 'nullable|array',
            'lien.*' => 'url',
            'exp_titre' => 'nullable|array',
            'exp_titre.*' => 'string|max:255',
            'nom' => 'nullable|array',
            'nom.*' => 'string|max:255',
            'duree' => 'nullable|array',
            'duree.*' => 'string|max:255',
            'ex_description' => 'nullable|array',
            'ex_description.*' => 'string',
        ]);
        // Enregistrer les fichiers
        $cvPath = $request->file('cv')->store('cvs');
        $lettrePath = $request->file('lettre')->store('lettres');
        $thesePath = $request->file('these')->store('theses');
        $userEmail = Auth::user()->email;
        $existingApplication = DB::table('dossier_de_candature_pers')
        ->join('candidature_pers', 'dossier_de_candature_pers.candidatures_id', '=', 'candidature_pers.id')
        ->where('candidature_pers.email', $userEmail)
        ->where('dossier_de_candature_pers.offre_id', $request->id)
        ->exists();

    if ($existingApplication) {
        return redirect()->back()->with('error', 'Vous avez déjà postulé pour cette offre.');
    }

        // // Créer une nouvelle candidature
        $application = candidaturePers::create([
            'cv' => $cvPath,
            'lettre' => $lettrePath,
            'datenaissance' => $request->input('datenaissance'),
            'these' => $thesePath,
            'email' =>  $userEmail,
        ]);

        // // Enregistrer les diplômes
        foreach ($request->input('pub_titre', []) as $index => $title) {
            Diplome::create([
                'candidatures_id' => $application->id,
                'pub_titre' => $title,
                'pub_institution' => $request->input('pub_institution')[$index] ?? '',
                'pub_annee' => $request->input('pub_annee')[$index] ?? null,
                'pub_etude' => $request->input('pub_etude')[$index] ?? '',
            ]);
        }

        // Enregistrer les publications
        foreach ($request->input('titre', []) as $index => $title) {
            Publication::create([
                'candidatures_id' => $application->id,
                'titre' => $title,
                'annee' => $request->input('annee')[$index] ?? null,
                'journal' => $request->input('journal')[$index] ?? '',
                'lien' => $request->input('lien')[$index] ?? '',
            ]);
        }

        // Enregistrer les expériences
        foreach ($request->input('exp_titre', []) as $index => $title) {
            Experience::create([
                'candidatures_id' => $application->id,
                'exp_titre' => $title,
                'nom' => $request->input('nom')[$index] ?? '',
                'duree' => $request->input('duree')[$index] ?? '',
                'ex_description' => $request->input('ex_description')[$index] ?? '',
            ]);
        }
        $dossier = DossierDeCandaturePers::create([
            'candidatures_id' => $application->id,
            'offre_id' => $request->id,
            'datedecreation' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Votre candidature a été soumise avec succès.');
    }
}

