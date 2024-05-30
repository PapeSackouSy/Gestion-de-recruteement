<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DRH;
use App\Models\ViceRecteur;
class ProjetControlleurDRH extends Controller
{
    public function AfficherDRH()
   {
      return view('Users.AjouterDRH');
   }
   public function AfficherVice()
   {
      return view('Users.AjouterViceRecteur');
   }
   public function store(Request $request)
   {
       $request->validate(['email' => 'required']);
       $drh = new DRH();
       $drh->email = $request->email;
       $drh->save();

       return redirect()->route('dash')->with('success', 'DRH ajouter avec  success');
   }
   public function storeVice(Request $request)
   {
       $request->validate(['email' => 'required']);
       $drh = new ViceRecteur();
       $drh->email = $request->email;
       $drh->save();

       return redirect()->route('dash')->with('success', 'Vice recteur ajouter avec  success');
   }
}
