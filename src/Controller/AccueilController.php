<?php

namespace App\Controller;

use App\Model\ModelAccueil;

class AccueilController extends AbstractController
{
    public function index()
    {
        // j'appelle ma class ModelAccueil
        $modelAccueil = new ModelAccueil();

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        if(isset($_GET['search'])) {
            $limit = $_GET['search'];
        } else {
            $research = "";
        }

        $order = $_GET['order'] ?? ($_GET = 1);

        if(isset($_GET['select'])) {
            $order = $_GET['select'];
        } else {
            $select = "";
        }

        if(isset($_GET['research'])) {
            $order = $_GET['research'];
        } else {
            $research = "";
        }

        $accueil = $modelAccueil->findAll([
            'order' => $order,
            'select' => $select,
            'research' => $research,
            'currentPage' => $currentPage,
        ]);


        // je récupère ma vue
        $this->render('Accueil.php', [
            'accueil' => $accueil,
            'currentPage' => $currentPage,
        ]);
    }
}


