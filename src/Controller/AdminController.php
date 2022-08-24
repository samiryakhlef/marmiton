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

        $order = $_GET['order'] ?? 1;

        if (isset($_GET['select'])) {
            $order = $_GET['select'];
        }
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        } else {
            $type = '';
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

    /**
     * @throws \JsonException
     */
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

    public function edit()
    {
        $ModelAccueil = new ModelAccueil();
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $accueil = $ModelAccueil->editRecette($id);
            $this->render('AdminEdit.php', [
                'accueil' => $accueil
            ]);
        }
    }
    public function update()
    {
        $ModelAccueil = new ModelAccueil();
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = strip_tags($_GET['id']);
            $recette = $ModelAccueil->editRecette($id);
        }
    
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);
            $ingredients = strip_tags($_POST['ingredients']);
            $steps = strip_tags($_POST['steps']);
            $difficulty = strip_tags($_POST['difficulty']);
            $type = strip_tags($_POST['type']);
            $image =($_POST['image'] ?? null);
            $ModelAccueil->updateRecette($id, $name, $description, $ingredients, $steps, $difficulty, $type, $image);
            header('Location: index.php?page=admin');
            exit;
        }
        
        $this->render('Update.php', [
            'recette' => $recette
        ]);
    }
}
