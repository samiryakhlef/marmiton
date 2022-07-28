<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ModelAccueil;

class DetailsController extends AbstractController
{
    public function index()
    {
        // On détermine sur quelle page on se trouve
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $currentPage = (int) strip_tags($_GET['p']);
        } else {
            $currentPage = 1;
        }
        //j'instancie la base données
        //$ModelAccueil = new ModelAccueil();
        //je récupère la liste des entrées
        //$accueils = $ModelAccueil->findAll($currentPage);
        //je récupère la fonction create pour update en base de données
        //$create = $ModelAccueil->create($id, $name, $description, $ingredient, $difficulty, $type);
        
        $this->render('Details.php', [
            //'recettes'=> $create,
            //'pages' => $accueils,
        ]);
    }
}
