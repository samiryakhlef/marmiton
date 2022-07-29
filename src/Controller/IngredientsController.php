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

        $this->render('Ingredients.php');
    }
}
