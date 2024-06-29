<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OffresPers;
use App\Models\Departement;
class DepartementController extends Controller
{
    public function showEspace($departementId)
        {
            $offrespers = OffresPers::where('departement_id', $departementId)->get();
            $usecaseDep = Departement::all();

            return view('OffresPERS.Afficher', compact('offrespers', 'usecaseDep'));
        }

}
