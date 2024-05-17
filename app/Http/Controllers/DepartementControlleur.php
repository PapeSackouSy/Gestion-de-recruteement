<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\User;
use App\Models\Ufr;
class DepartementControlleur extends Controller
{
    public function AfficherDepartement()
    {
        $users =User::where('role', 'Responsable_Departement')->get();
        $ufrs=Ufr::all();
        return view('Departement.AjouterDepartement', compact('users','ufrs'));
    }
    public function AjouterDep(Departement $dep,Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:departements,nom|string|max:255',
            'responsable_departement_id' => 'required|unique:departements,responsable_departement_id',
            'id_ufr'=> 'required'
        ]);
        $dep=Departement::create([
            'nom' => $request->nom,
            'responsable_departement_id' => $request->responsable_departement_id,
            'id_ufr'=> $request->id_ufr
        ]);
        return redirect()->back()->with('success', 'le Departement a ete créé avec succès!');
    }
        public function listerDepartement()
        {
            $dep=Departement::all();
            return view('Departement.ListerDepartement',compact('dep'));
        }
}
