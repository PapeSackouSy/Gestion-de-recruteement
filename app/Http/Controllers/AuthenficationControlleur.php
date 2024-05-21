<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufr;
use App\Models\Departement;
use App\Models\DRH;
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
        return view('Dashboard.Dashboard',compact('usecase','usecaseDep','usecaseDRH'));
    }
    public function VueUFR()
    {
        return view('usecase.AjouterUfr');
    }
}
