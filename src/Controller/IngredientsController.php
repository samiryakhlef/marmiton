<?php

namespace App\Controller;

use Verot\Upload\Upload;
use App\Model\ModelAccueil;
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
            $temps = htmlentities(trim($_POST['temps'])) ?? 0;
            $steps = htmlentities(trim($_POST['steps']));


            $file = new Upload($_FILES['image'], 'fr_FR');
            if ($file->uploaded) {
                $folder = realpath(dirname(__FILE__) . '/../../upload');
                $file->process($folder);
                if ($file->processed) {
                    $file->clean();
                } else {
                    echo 'error : ' . $file->error;
                }
                
            }

            if (
                !empty($name) && !empty($description) && !empty($ingredients) && !empty($difficulty) && !empty($type) && !empty($temps)
            ) {

                $recette = new ModelAccueil();
                $recette->addRecette($name, $description, $ingredients, $difficulty, $type, $temps, $steps, $file->file_dst_name);
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

        
            $file = new Upload($_FILES['image'], 'fr_FR');
            if ($file->uploaded) {
                $file->process('../upload/' . $file->file_dst_path);
                if ($file->processed) {
                    $file->clean();
                } else {
                    echo 'error : ' . $file->error;
                }
            }

            if (
                !empty($name) && !empty($description) && !empty($ingredients) && !empty($difficulty) && !empty($type) && !empty($temps)
            ) {

                $recette = new ModelAccueil();
                $recette->addRecette($name, $description, $ingredients, $difficulty, $type, $temps, $steps, $file->file_dst_name);
                $this->sendJson(['success' => true]);
            }

            $this->sendJson(['success' => false]);
        }
    }

    public function __toString()
    {
        return $this->image;
    }
}
