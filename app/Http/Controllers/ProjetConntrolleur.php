<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Models\Ufr;
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
    return redirect()->route('login')->with('success1','Votre Compte a ete cree');
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
                        }else
                        {
                            return redirect()->back()->with('success','Attention! Email ou password incorrect');
                        }


        }
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }
             public function VueUFR()
            {
                $users = User::where('role', 'Directeur_UFR')->get();
                return view('usecase.AjouterUfr',compact('users'));
            }
            public function store(Ufr $ufr,Request $request)
            {
                $request->validate([
                    'nom' => 'required|unique:ufrs,nom|string|max:255',
                    'responsable_ufr_id' => 'required|unique:ufrs,responsable_ufr_id',
                ]);
                $ufr=Ufr::create([
                    'nom' => $request->nom,
                    'responsable_ufr_id' => $request->responsable_ufr_id,
                ]);
                return redirect()->back()->with('success', 'UFR créé avec succès!');
            }
            public function Afficher()
            {
                $tab = Ufr::all();
                return view('usecase.AfficherUfr',compact('tab'));
            }
            public function EditerUfr($id)
            {
                $tab=Ufr::find($id);
                $users = User::where('role', 'Directeur_UFR')->get();
                return view('usecase.EditerUfr',compact('tab','users'));
            }
            public function UpdateUfr(Ufr $ufr,Request $request)
            {
                $ufr->nom=$request->nom;
                $ufr->description=$request->responsable_ufr_id;
                $ufr->update();
                return redirect()->route('afficher')->with('success', 'UFR a ete modifier avec succès!');
            }
            public function supprimerUfr($id)
            {
                $ufrdelete=Ufr::find($id);
                $ufrdelete->delete();
                return redirect()->route('afficher')->with('success','UFR a ete supprimer avec success');
            }
            public function AfficherUSERS()
            {
                $user=User::all();
                return view('Users.AfficherUsers',compact('user'));
            }
            public function EditerUser($id)
            {
                $user=User::find($id);
                return view('Users.EditerUser',compact('user'));
            }
            public function updateUser(User $user,Request $request)
            {
                $user=User::find($request->id);
                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->adresse = $request->adresse;
                $user->telephone = $request->telephone;
                $user->email = $request->email;
                $user->password =$request->password;
                $user->role = $request->role;
                $user->update();
                return redirect()->route('afficherUser')->with('success', 'Utilisateur mis à jour avec succès!');
            }
            public function deleteApp(Request $request)
            {
                $user = User::find($request->id);
                $user->delete();
                return redirect()->route('afficherUser')->with('success', 'Utilisateur supprimé avec succès!');
            }
}
