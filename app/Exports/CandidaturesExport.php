<?php

namespace App\Exports;

use App\Models\CandidaturePers;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CandidaturesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Récupérer les candidatures avec les relations nécessaires
        return CandidaturePers::with(['users', 'dossier.offre'])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Prenom',
            'Email',
            'Date de naissance',
            'Offre',
            'Adresse',
            'Téléphone',
            'Date de Creation du Dossier',
            'Lien CV',
            'Lien Lettre de Motivation',
            'Lien These',
        ];
    }

    public function map($candidature): array
    {
        return [
            $candidature->id,
            $candidature->userInfo->nom,
            $candidature->userInfo->prenom,
            $candidature->email,
            $candidature->datenaissance ?? 'Non disponible',
            $candidature->dossier->offre->Titre ?? 'Non disponible',
            $candidature->userInfo->adresse,
            $candidature->userInfo->telephone,
            $candidature->dossier->datedecreation,
            asset('storage/' . $candidature->cv),
            asset('storage/' . $candidature->lettre),
            asset('storage/' . $candidature->These),
        ];
    }
}
