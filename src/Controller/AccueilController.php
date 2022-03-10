<?php

namespace App\Controller;

use App\Model\ModelAccueil;
use App\Controller\AbstractController;

class AccueilController extends AbstractController
{
    public function index()
    {
        $modelAccueil = new ModelAccueil();

        $accueil = $modelAccueil->findAll();
        $plats = $modelAccueil->findByType('plats');
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits

        // je définie une valeur à la page
        if (!isset($_GET['page'])) {

            $page_number = 1;
        } else {

            $page_number = $_GET['page'];
        }

        //variable pour stocker le nombre de lignes par page
        $limit = 3;
        $total_rows = 7;
        
        //je recupere le numero de la page 
        $initial_page = ($page_number-1)*$limit;

        //Je recupere le numero de la page
        $total_pages = ceil ($total_rows / $limit); 



        $this->render('Accueil.php', [
            'accueil' => $accueil,
            'plats' => $plats,
            'total_pages' => $total_pages
        ]);
    }

    
}
