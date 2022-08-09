<?php

namespace App\Controller;

use App\Model\ModelAccueil;

class AdminController extends AbstractController
{
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
        if(isset($_GET['type'])) {
            $type = $_GET['type'];
        } 


        $ModelAccueil = new ModelAccueil();
        $accueils = $ModelAccueil->findByPage($currentPage, $order, $research, $type);
        $pages = $ModelAccueil->countPage($research);

        $this->render('Admin.php', [
            'accueils' => $accueils,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'research' => $research,
            'order' => $order
        ]);
    }

    // je créer une fonction delete qui prend en paramètre l'id de la recette à supprimer
    public function delete()
    {
        $ModelAccueil = new ModelAccueil();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $ModelAccueil->delete($id);
        header('Location: index.php?page=admin');
        exit;
        $this->sendJson(['success' => false]);
    }
}
