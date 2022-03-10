<?php

namespace App\Controller;

use App\Model\ModelAccueil;
use App\Controller\AbstractController;
use PDO;

class AccueilController extends AbstractController
{
    public function index()
    {
        // j'appelle ma class ModelAccueil
        $modelAccueil = new ModelAccueil();

        // j'appelle ma fonction findAll
        $accueil = $modelAccueil->findAll();

        //j'appelle ma fonction findByType
        $plats = $modelAccueil->findByType('plats');

        //PAGINATION

        // On détermine sur quelle page on se trouve
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
            $currentPage = 1;
        }

        // requête nombre d'articles BDD,j'utilise le "COUNT" 
        $sql = 'SELECT COUNT(*) AS nb_articles FROM `entrees`';


        // je prepare ma requete
        $pdoStatement = $this->pdo->prepare($sql);

        //j'execute ma requête
        $pdoStatement->execute();

        //je fetchAll mes recettes
        $result = $pdoStatement->fetchAll();


        // je retourne le nombres de recettes dans ma table 'entrees'
        $nb_articles = $result['nb_articles'];

        // On détermine le nombre d'articles par page
        $parPage = 3;

        // On calcule le nombre de pages total
        $pages = ceil($nb_articles / $parPage);





        $this->render('Accueil.php', [
            'accueil' => $accueil,
            'plats' => $plats,
            'page' => $currentPage,

        ]);
    }
}
