<?php

namespace App\Controller;

use App\Database\Recette;
use App\Controller\AbstractController;

class IngredientsController extends AbstractController
{
    public function index()
    {
        // On détermine sur quelle page on se trouve
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $currentPage = (int) strip_tags($_GET['p']);
        } else {
            $currentPage = 1;
        }
        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {
            $ingredients = strip_tags($_POST['ingredients']);
            $name = htmlentities(trim($_POST['name']));
            $description = htmlentities(trim($_POST['description']));
            $ingredients = htmlentities(trim($_POST['ingredients']));
            $difficulty = htmlentities(trim($_POST['difficulty']));
            $type = htmlentities(trim($_POST['type']));
            $temps = htmlentities(trim($_POST['temps']));

            if (
                !empty($name) && !empty($description) && !empty($ingredients) && !empty($difficulty) && !empty($type) && !empty($temps)
            ) {

                $recette = new Recette();
                $recette->addRecette($name, $description, $ingredients, $difficulty, $type, $temps);
            }
        }
        $this->render('Ingredients.php');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {
            $ingredients = strip_tags($_POST['ingredients']);
            $name = htmlentities(trim($_POST['name']));
            $description = htmlentities(trim($_POST['description']));
            $ingredients = htmlentities(trim($_POST['ingredients']));
            $difficulty = htmlentities(trim($_POST['difficulty']));
            $type = htmlentities(trim($_POST['type']));
            $temps = htmlentities(trim($_POST['temps']));

            if (
                !empty($name) && !empty($description) && !empty($ingredients) && !empty($difficulty) && !empty($type) && !empty($temps)
            ) {

                $recette = new Recette();
                $recette->addRecette($name, $description, $ingredients, $difficulty, $type, $temps);
                $this->sendJson(['success' => true]);
            }

            $this->sendJson(['success' => false]);
        }
    }
}
