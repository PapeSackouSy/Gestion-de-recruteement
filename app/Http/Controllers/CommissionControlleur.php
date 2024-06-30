<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufr;
use App\Models\Departement;
use App\Models\OffresPers;
use App\Models\Commission;
use Illuminate\Support\facades\Auth;
class CommissionControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements=Departement::all();

            $userId = Auth::id();
            $ufr = Ufr::where('responsable_ufr_id', $userId)->first();
            if ($ufr) {
                $ufrId = $ufr->id;
                $offres = OffresPers::whereHas('departement', function ($query) use ($ufrId) {
                    $query->where('id_ufr', $ufrId);
                })->get();

            } else {
                $offres = collect();
            }

        $usecase=Ufr::all();
        return view('Commission.afficher',compact('departements','usecase','offres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData=$request->validate([
            'nom' => 'required|string|max:255',
            'mandat' => 'required',
            'date_creation' => 'required|date',
            'date_expiration' => 'required|date',
            'id_departement' => 'nullable|exists:departements,id',
            'offres' => 'nullable|array',
            'offres.*' => 'exists:offres_pers,id',
        ]);
        $commission = Commission::create([
            'nom' => $validatedData['nom'],
            'mandat' => $validatedData['mandat'],
            'id_departement' => $validatedData['id_departement'],
            'date_creation' => $validatedData['date_creation'],
            'date_expiration' => $validatedData['date_expiration'],
        ]);
        if (!empty($validatedData['offres'])) {
            $commission->offres()->sync($validatedData['offres']);
        }
        return redirect()->back()->with('success', 'Commission créée avec succès');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
            $commissions = Commission::all();
            $usecase=Ufr::all();
            return view('Commission.lister', compact('commissions','usecase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $commission = Commission::findOrFail($id);
        $userId = Auth::id();
        $ufr = Ufr::where('responsable_ufr_id', $userId)->first();
        if ($ufr) {
            $ufrId = $ufr->id;
            $offres = OffresPers::whereHas('departement', function ($query) use ($ufrId) {
                $query->where('id_ufr', $ufrId);
            })->get();

        } else {
            $offres = collect();
        }

        $usecase=Ufr::all();
        $departements=Departement::all();
        return view('Commission.edit', compact('commission','usecase','departements','offres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'mandat' => 'required',
            'date_creation' => 'required|date',
            'date_expiration' => 'required|date',
            'id_departement' => 'nullable|exists:departements,id',
            'offres' => 'nullable|array',
            'offres.*' => 'exists:offres_pers,id',
        ]);

        // Récupération de la commission à mettre à jour
        $commission = Commission::findOrFail($id);

        // Mise à jour des attributs de la commission
        $commission->nom = $validatedData['nom'];
        $commission->mandat = $validatedData['mandat'];
        $commission->date_creation = $validatedData['date_creation'];
        $commission->date_expiration = $validatedData['date_expiration'];
        $commission->id_departement = $validatedData['id_departement'];

        // Sauvegarde des changements sur la commission
        $commission->save();

        // Mise à jour des offres associées
        if (!empty($validatedData['offres'])) {
            $commission->offres()->sync($validatedData['offres']);
        } else {
            // Si aucune offre n'est sélectionnée, supprimer toutes les associations existantes
            $commission->offres()->detach();
        }

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Commission mise à jour avec succès');
    }

    public function destroy($id)
    {
        $commission = Commission::findOrFail($id);
        $commission->delete();
        return redirect()->route('showCommission')->with('success', 'Commission supprimée avec succès');
    }
}
