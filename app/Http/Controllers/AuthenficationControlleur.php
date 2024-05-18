<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufr;
use App\Models\Departement;
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
        return view('Dashboard.Dashboard',compact('usecase','usecaseDep'));
    }
    public function VueUFR()
    {
        return view('usecase.AjouterUfr');
    }
}
