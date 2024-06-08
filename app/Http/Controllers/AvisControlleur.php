<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DRH;
use App\Models\OffresPers;
use App\Models\Avis;
class AvisControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $usecaseDRH=DRH::all();
        $offre=OffresPers::find($id);
        return view('AvisDerecrutement.AvisOffresPers',compact('usecaseDRH','offre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'composition_dossier' => 'required|string',
            'depot_candidature' => 'required|string',
            'datedebut' => 'nullable|date',
            'datefin' => 'nullable|date',
        ]);
        $offre=new Avis();
        $offre->composition_dossier = $request->input('composition_dossier');
        $offre->depot_candidature = $request->input('depot_candidature');
        $offre->datedebut = $request->input('datedebut');
        $offre->datefin = $request->input('datefin');
        $offre->id_offres=$request->id;
        $offre->save();
        return redirect()->back()->with('success','Avis a ete ajouter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $usecaseDRH=DRH::all();
        $avis=Avis::all();
        return view('AvisDerecrutement.afficherAvis',compact('usecaseDRH','avis'));
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
