<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufr;
use App\Models\Departement;
use App\Models\DRH;
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

        return view('Dashboard.Dashboard',compact('usecase','usecaseDep','usecaseDRH','usecaseVice'));
    }
    public function VueUFR()
    {
        return view('usecase.AjouterUfr');
    }
}
