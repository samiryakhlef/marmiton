<?php

namespace App\Controller;

use PDO;
use App\Model\ModelAccueil;

class AccueilController extends AbstractController
{
    const TABLE_NAME = 'entrees';

    public function index()
    {
        $ModelAccueil = new ModelAccueil();

        if (isset($_GET['p'])) {
            $currentPage = $_GET['p'];
        } else {
            $currentPage = 1;
        }

        if (isset($_GET['search'])) {
            $research = $_GET['search'];
        } else {
            $research = '';
        }

        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 1;
        }

        if (isset($_GET['select'])) {
            $order = $_GET['select'];
        }

        if (isset($_GET['research'])) {
            $research = strtolower($_GET['research']);
        } else {
            $research = '';
        }
        if(isset($_GET['type'])) {
            $type = $_GET['type'];
        } else{
            $type = '';
        }

        $accueils = $ModelAccueil->findByPage($currentPage, $order, $research, $type);
        $pages = $ModelAccueil->countPage($research);

        $this->render('Accueil.php', [
            'accueils' => $accueils,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'research' => $research,
            'order' => $order,
            'research' => $research,
        ]);
    }

    }

