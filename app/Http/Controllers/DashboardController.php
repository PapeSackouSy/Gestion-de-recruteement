<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Departement;
use App\Models\Commission;

class DashboardController extends Controller
{
    public function checkAccess($departementId)
    {
        $user = Auth::user();

        // Vérifier si l'utilisateur est responsable du département
        $isResponsable = Departement::where('id', $departementId)
                                    ->where('responsable_departement_id', $user->id)
                                    ->exists();

        if ($isResponsable) {
            return true;
        }

        // Vérifier si l'utilisateur est membre d'une commission rattachée au département
        $isCommissionMember = Commission::where('id_departement', $departementId)
                                        ->whereHas('membres', function ($query) use ($user) {
                                            $query->where('email', $user->email);
                                        })
                                        ->exists();

        return $isCommissionMember;
    }
}
