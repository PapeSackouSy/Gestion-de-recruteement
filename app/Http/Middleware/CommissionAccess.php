<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commission;
use App\Models\Departement;
use App\Models\Membre;

class CommissionAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $departementId = $request->route('departement_id'); // Supposons que l'ID du département soit dans la route

        // Vérifiez si l'utilisateur est le responsable du département
        $isResponsable = Departement::where('id', $departementId)
                                    ->where('responsable_departement_id', $user->id)
                                    ->exists();

        if ($isResponsable) {
            return $next($request);
        }

        // Vérifiez si l'utilisateur est membre d'une commission rattachée à ce département
        $isCommissionMember = Commission::where('id_departement', $departementId)
                                        ->whereHas('membres', function ($query) use ($user) {
                                            $query->where('email', $user->email);
                                        })
                                        ->exists();

        if ($isCommissionMember) {
            return $next($request);
        }

        // Redirigez ou affichez un message d'erreur
        return redirect()->route('unauthorized')->with('error', 'Vous n\'avez pas accès à cet espace.');
    }
}
