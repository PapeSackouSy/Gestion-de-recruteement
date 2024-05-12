<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('Dashboard.Dashboard');
    }
    public function VueUFR()
    {
        return view('usecase.AjouterUfr');
    }
}
