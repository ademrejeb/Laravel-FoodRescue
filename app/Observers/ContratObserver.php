<?php
namespace App\Observers;

use App\Models\Contrat;
use App\Models\ContratHistory;

class ContratObserver
{
    // Méthode appelée lors de la mise à jour d'un contrat
    public function updated(Contrat $contrat)
    {
        ContratHistory::create([
            'contrat_id' => $contrat->id,
            'changes' => json_encode($contrat->getChanges()), // Convertir les changements en JSON
            'user_id' => auth()->id(), // ID de l'utilisateur connecté
        ]);
    }
}
