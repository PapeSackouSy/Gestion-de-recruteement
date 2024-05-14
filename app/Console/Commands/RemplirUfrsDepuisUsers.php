<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ufr;
use App\Models\User;

class RemplirUfrsDepuisUsers extends Command
{
    protected $signature = 'remplir:ufrs-depuis-users';
    protected $description = 'Remplit la table UFR avec les utilisateurs responsables correspondants depuis la table Users';

    public function handle()
    {
        $responsables = User::where('role', 'responsable_ufr')->get();

        foreach ($responsables as $responsable) {
            Ufr::create([
                'nom' => 'UFR de ' . $responsable->nom, // Créer un nom d'UFR basé sur le nom de l'utilisateur responsable
                'responsable_ufr_id' => $responsable->id
            ]);
        }

        $this->info('La création des UFR depuis les utilisateurs responsables est terminée.');
    }
}


