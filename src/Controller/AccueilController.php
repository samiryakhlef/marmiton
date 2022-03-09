<?php

namespace App\Controller;

use App\Model\ModelAccueil;
use App\Controller\AbstractController;

class AccueilController extends AbstractController
{
    public function index()
    {
        $modelAccueil = new ModelAccueil();

        $entrees = $modelAccueil->findAll();
        $plats = $modelAccueil->findByType('plats');
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        $this->render('Accueil.php', [
            'accueil' => $entrees,
            'plats' => $plats,
        ]);
    }
}
