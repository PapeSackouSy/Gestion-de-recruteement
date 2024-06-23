<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufr;
use App\Models\Departement;
use App\Models\Commission;
class CommissionControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements=Departement::all();
        $usecase=Ufr::all();
        return view('Commission.afficher',compact('departements','usecase'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'mandat' => 'required',
            'date_creation' => 'required|date',
            'date_expiration' => 'required|date',
            'id_departement' => 'nullable|exists:departements,id', // Validation facultative si liée à un département
        ]);

        $commission = Commission::create($request->all());
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
        $usecase=Ufr::all();
        $departements=Departement::all();
        return view('Commission.edit', compact('commission','usecase','departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'mandat' => 'required|string',
            'date_creation' => 'required|date',
            'date_expiration' => 'required|date|after_or_equal:date_creation',
            'id_departement' => 'nullable|exists:departements,id', // Vérifie que l'id du département est valide
        ]);

        $commission = Commission::findOrFail($request->id);
        $commission->update($validatedData);
        return redirect()->route('showCommission')->with('success', 'Commission mise à jour avec succès');
    }

    public function destroy($id)
    {
        $commission = Commission::findOrFail($id);
        $commission->delete();
        return redirect()->route('showCommission')->with('success', 'Commission supprimée avec succès');
    }
}
