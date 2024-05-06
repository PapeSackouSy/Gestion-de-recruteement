<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\facades\Auth;
class ProjetConntrolleur extends Controller
{
 public function Recuper(AuthRequest $request)
 {
    $user = new User();
    $user->nom = $request->nom;
    $user->prenom = $request->prenom;
    $user->adresse = $request->adresse;
    $user->telephone = $request->telephone;
    $user->email = $request->email;
    $user->password =$request->password;
    $user->role = $request->role;
    $user->save();
    return redirect()->route('login');
 }
        public function authenticate(Request $request)
        {
                        $credentials = $request->validate([
                            'email' => ['required', 'email'],
                            'password' => ['required'],
                        ]);

                        if (Auth::attempt($credentials)) {
                            $request->session()->regenerate();

                             return redirect()->intended('dashboard');
                        }


        }
}
