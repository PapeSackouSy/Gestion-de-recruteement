<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ufr;
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
        return view('Dashboard.Dashboard',compact('usecase'));
    }
    public function VueUFR()
    {
        return view('usecase.AjouterUfr');
    }
}
