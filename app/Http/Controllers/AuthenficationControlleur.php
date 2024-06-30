<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufr;
use App\Models\Departement;
use App\Models\DRH;
use App\Models\OffresPers;
use App\Models\ViceRecteur;
use App\Models\User;
class AuthenficationControlleur extends Controller
{

    public function LoginAfficher()
    {
        return view('login');
    }
    public function RegisterAfficher()
    {
        return view('Register');
    }
    public function dashboard()
    {
        $usecase=ufr::all();
        $usecaseDep=Departement::all();
        $usecaseDRH=DRH::all();
        $usecaseVice=ViceRecteur::all();
        $offres = OffresPers::with('responsable.commission')->get();
        return view('Dashboard.Dashboard',compact('usecase','offres','usecaseDep','usecaseDRH','usecaseVice'));
    }
    public function VueUFR()
    {
        return view('usecase.AjouterUfr');
    }
}
