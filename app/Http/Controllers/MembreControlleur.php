<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Ufr;
use App\Models\Membre;
use Illuminate\Support\Facades\DB;
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
            'role' => [
              'required',
              'in:President,Raporteur,membre',
            function ($attribute, $value, $fail) use ($request) {
             if (in_array($value, ['President', 'Raporteur'])) {
                $exists = DB::table('membres')
                    ->where('commission_id', $request->commission_id)
                    ->where('role', $value)
                    ->exists();

                if ($exists) {
                    $fail('Le rôle de ' . $value . ' est déjà attribué pour cette commission.');
                }
            }
        },
    ],
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
    public function update(Request $request, $id)
    {
        // Validation des données de la requête
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'role' => 'required|in:President,Rapporteur,membre',
            'commission_id' => 'nullable|exists:commissions,id',
            'email' => 'required|string|email|max:255|unique:membres,email,' . $id,
            'telephone' => 'required|string|max:20',
        ]);

        try {
            // Récupération du membre à mettre à jour
            $membre = Membre::findOrFail($id);

            // Mise à jour des attributs du membre
            $membre->nom = $validatedData['nom'];
            $membre->prenom = $validatedData['prenom'];
            $membre->role = $validatedData['role'];
            $membre->commission_id = $validatedData['commission_id'];
            $membre->email = $validatedData['email'];
            $membre->telephone = $validatedData['telephone'];

            // Sauvegarde des changements sur le membre
            $membre->save();

            // Redirection avec un message de succès
            return redirect()->route('showmembre')->with('success', 'Membre mis à jour avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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
