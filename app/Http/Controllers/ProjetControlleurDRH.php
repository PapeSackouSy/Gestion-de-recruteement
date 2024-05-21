<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DRH;
class ProjetControlleurDRH extends Controller
{
    public function AfficherDRH()
   {
      return view('Users.AjouterDRH');
   }
   public function store(Request $request)
   {
       $request->validate(['email' => 'required']);
       $drh = new DRH();
       $drh->email = $request->email;
       $drh->save();

       return redirect()->route('dash')->with('success', 'DRH ajouter avec  success');
   }
}
