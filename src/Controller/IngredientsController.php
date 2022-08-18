<?php

namespace App\Controller;

use App\Database\Recette;
use App\Controller\AbstractController;
use App\Model\ModelAccueil;

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
            $steps = htmlentities(trim($_POST['steps']));
            $imageName = ($_POST['image_name']) ?? null;

            if (
                !empty($name) && !empty($description) && !empty($ingredients) && !empty($difficulty) && !empty($type) && !empty($temps)
            ) {

                $recette = new ModelAccueil();
                $recette->addRecette($name, $description, $ingredients, $difficulty, $type, $temps,$steps, $imageName);
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
            $difficulty = htmlentities(trim($_POST['difficulty']));
            $type = htmlentities(trim($_POST['type']));
            $temps = htmlentities(trim($_POST['temps']));
            $steps = htmlentities(trim($_POST['steps']));
            $imageName = ($_POST['image_name']) ?? null;

            if (
                !empty($name) && !empty($description) && !empty($ingredients) && !empty($difficulty) && !empty($type) && !empty($temps)
            ) {

                $recette = new ModelAccueil();
                $recette->addRecette($name, $description, $ingredients, $difficulty, $type, $temps,$steps, $imageName);
                $this->sendJson(['success' => true]);
            }

            $this->sendJson(['success' => false]);
        }
    }
}