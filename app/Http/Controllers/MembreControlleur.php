<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Ufr;
use App\Models\Membre;
class MembreControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commissions = Commission::all();
        $usecase=Ufr::all();
        return view('membre.afficher', compact('commissions','usecase'));
    }


    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'role' => 'required|in:President,Raporteur,membre',
            'commission_id' => 'required|exists:commissions,id',
            'email' => 'required|email|unique:membres,email',
            'telephone' => 'required|string|max:15',
        ]);

        Membre::create($validatedData);

        return redirect()->back()->with('success', 'Membre ajouté avec succès');
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $membres = Membre::with('commission')->get();
        $usecase=Ufr::all();
        return view('membre.lister', compact('membres','usecase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $membres=Membre::find($id);
        $commissions = Commission::all();
        $usecase=Ufr::all();
        return view('membre.edit',compact('membres','commissions','usecase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData=$request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'role' => 'required|in:President,Rapporteur,membre',
            'commission_id' => 'nullable|exists:commissions,id',
            'email' => 'required|string|email|max:255|unique:membres,email',
            'telephone' => 'required|string|max:20',
        ]);

         $membre = Membre::findOrFail($request->id);
         $membre->update($validatedData);
         return redirect()->route('showmembre')->with('success', 'Membre mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $membre = Membre::findOrFail($id);
        $membre->delete();
        return redirect()->route('showmembre')->with('success', 'Commission supprimée avec succès');
    }
}
