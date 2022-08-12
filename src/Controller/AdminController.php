<?php

namespace App\Controller;

use App\Database\Recette;
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

        if (isset($_GET['id']) && !empty($_GET['id']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['ingredients']) && !empty($_POST['ingredients']) && isset($_POST['steps']) && !empty($_POST['steps']) && isset($_POST['difficulty']) && !empty($_POST['difficulty']) && isset($_POST['type']) && !empty($_POST['type'])) {
            
            $id = $_GET['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $ingredients = $_POST['ingredients'];
            $difficulty = $_POST['difficulty'];
            $type = $_POST['type'];
            $temps = $_POST['temps'];
            $steps = $_POST['steps'];

            $ModelAccueil->updateRecette($id, $name, $description, $ingredients, $steps, $difficulty, $type, $temps);
            
            header('Location: http://localhost/marmiton/index.php?page=admin');
            exit;
        }
        $this->render('Update.php', [
            'recette' => $recette
        ]);
    }
}
