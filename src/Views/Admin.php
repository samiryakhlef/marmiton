<?php

namespace App\Views;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use App\Database;

//connexion base de donnée
$db = new Database();
$db->Connect();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
    <title>Marmiton</title>
</head>

<body>
    <header>

        <!------------------------------------------- navbar --------------------------------------------->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="barre de navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><svg class="MRTN__sc-11duill-7 eiZuJc" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="309" height="48" viewBox="0 0 309 48">
                        <defs>
                            <path id="a" d="M0 .458h56.009V47H0z"></path>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#FE6F5F" d="M276.04 26.615c0 5.934-3.97 10.078-9.654 10.078-5.685 0-9.655-4.144-9.655-10.078 0-5.935 3.97-10.08 9.655-10.08 5.684 0 9.654 4.145 9.654 10.08m-9.654-14.78c-8.318 0-14.355 6.216-14.355 14.78 0 8.563 6.037 14.778 14.355 14.778 8.317 0 14.354-6.215 14.354-14.778 0-8.564-6.037-14.78-14.354-14.78m-40.257.637h-1.303c-.937 0-1.7.763-1.7 1.7v24.94c0 .935.763 1.698 1.7 1.698h1.303c.937 0 1.7-.763 1.7-1.699V14.172c0-.937-.763-1.7-1.7-1.7m-.675-10.55c-2.123 0-3.664 1.344-3.664 3.195 0 1.885 1.541 3.253 3.664 3.253 2.089 0 3.604-1.368 3.604-3.253 0-1.85-1.515-3.195-3.604-3.195m-18.009 9.913c-3.84 0-7.406 1.813-9.678 4.883a12.005 12.005 0 0 0-9.678-4.883c-2.494 0-5.06 1.165-7.332 3.304l.001-.966c0-.938-.763-1.7-1.7-1.7h-1.302a1.7 1.7 0 0 0-1.7 1.698v24.94c0 .937.762 1.7 1.7 1.7h1.31c.937 0 1.7-.764 1.7-1.7V23.818c0-4.01 3.284-7.271 7.323-7.271 4.038 0 7.323 3.261 7.323 7.27v15.294c0 .937.762 1.7 1.7 1.7h1.311c.936 0 1.7-.764 1.7-1.7V23.818c0-4.01 3.284-7.271 7.322-7.271 4.04 0 7.324 3.261 7.324 7.27v15.294c0 .937.763 1.7 1.7 1.7h1.31c.937 0 1.7-.764 1.7-1.7V23.818c0-6.608-5.398-11.983-12.034-11.983m88.77 0c-2.493 0-5.061 1.165-7.332 3.304v-.966c0-.938-.762-1.7-1.7-1.7h-1.301a1.7 1.7 0 0 0-1.7 1.698v24.94c0 .937.762 1.7 1.7 1.7h1.31c.937 0 1.7-.764 1.7-1.7V23.818c0-4.01 3.285-7.271 7.323-7.271s7.323 3.261 7.323 7.27v15.294c0 .937.763 1.7 1.7 1.7h1.31c.938 0 1.7-.764 1.7-1.7V23.818c0-6.608-5.398-11.983-12.033-11.983M149.04 26.615c0 5.934-3.97 10.078-9.654 10.078-5.684 0-9.655-4.144-9.655-10.078 0-5.935 3.971-10.08 9.655-10.08 5.684 0 9.654 4.145 9.654 10.08m3.003-14.143h-1.302a1.698 1.698 0 0 0-1.701 1.702v2.154c-2.77-2.907-6.157-4.492-9.654-4.492-8.318 0-14.355 6.215-14.355 14.779 0 8.563 6.037 14.778 14.355 14.778 3.497 0 6.884-1.586 9.656-4.495l-.002 2.212c0 .454.177.88.498 1.202.321.322.75.498 1.203.498h1.302c.937 0 1.7-.762 1.7-1.7V14.173c0-.937-.763-1.7-1.7-1.7m-42.597-.638a12.006 12.006 0 0 0-9.678 4.883 12.01 12.01 0 0 0-9.68-4.883c-2.492 0-5.06 1.165-7.33 3.304v-.965c0-.455-.176-.883-.498-1.204a1.685 1.685 0 0 0-1.202-.498h-1.302c-.937 0-1.7.763-1.7 1.7V39.11c0 .938.763 1.7 1.7 1.7h1.31c.937 0 1.7-.763 1.7-1.7V23.818c0-4.009 3.285-7.27 7.323-7.27s7.324 3.261 7.324 7.27v15.294c0 .937.762 1.7 1.7 1.7h1.31c.937 0 1.7-.764 1.7-1.7V23.818c0-4.01 3.285-7.271 7.323-7.271s7.324 3.261 7.324 7.27v15.294c0 .937.762 1.7 1.699 1.7h1.31c.938 0 1.7-.764 1.7-1.7V23.818c0-6.608-5.398-11.983-12.033-11.983m61.31.681c-3.2.236-6.05 1.445-8.312 3.512v-1.854a1.676 1.676 0 0 0-.496-1.203 1.684 1.684 0 0 0-1.202-.499h-1.303c-.937 0-1.7.763-1.7 1.7v24.94c0 .935.763 1.698 1.7 1.698h1.304c.937 0 1.699-.763 1.699-1.699V27.18c.03-5.496 3.498-9.498 8.628-9.96a1.699 1.699 0 0 0 1.524-1.687v-1.315a1.715 1.715 0 0 0-1.842-1.701m77.902 19.154h-1.3c-.936 0-1.699.763-1.699 1.7v.496a2.805 2.805 0 0 1-2.802 2.801 2.804 2.804 0 0 1-2.8-2.8V16.601h6.937c.937 0 1.7-.763 1.7-1.7v-.73c0-.938-.763-1.7-1.7-1.7h-6.937V5.798a1.7 1.7 0 0 0-1.699-1.7h-1.304c-.937 0-1.7.762-1.7 1.7v6.674h-2.629c-.937 0-1.7.762-1.7 1.7v.73c0 .937.763 1.7 1.7 1.7h2.63V33.89c0 3.047 1.804 5.813 4.49 6.885a8.16 8.16 0 0 0 3.018.592 7.42 7.42 0 0 0 4.193-1.287 7.498 7.498 0 0 0 3.301-6.213v-.497c0-.936-.762-1.699-1.699-1.699"></path>
                            <g transform="translate(0 .542)">
                                <mask id="b" fill="#fff">
                                    <use xlink:href="#a"></use>
                                </mask>
                                <path fill="#FE6F5F" d="M51.705 42.743c-.707.707-1.096.771-1.141.755-.4-.165-1.069-1.416-1.345-3.411 2.003.277 3.128.961 3.289 1.35.057.139-.111.614-.803 1.306zm-6.358-6.526H13.534C8.277 36.217 4 31.94 4 26.683c0-5.258 4.277-9.535 9.534-9.535h7.669c.936.018 2.381.095 3.53.326a2 2 0 0 0 .793-3.92c-.341-.07-.693-.126-1.045-.174-1.257-1.95-3.065-5.55-2.511-7.507.106-.375.336-.85 1.18-1.205 1.46-.617 2.443.33 5.067 3.897 2.667 3.622 6.319 8.583 13.033 8.583l4.097-.003v19.072zM55.735 40.1c-.891-2.154-3.622-3.19-6.388-3.514V17.148c0-2.205-1.795-4-4-4H41.25c-4.692 0-7.295-3.535-9.811-6.954-2.465-3.349-5.258-7.146-9.843-5.212-1.784.752-2.986 2.069-3.476 3.808-.767 2.72.413 5.987 1.616 8.358h-6.202C6.071 13.149 0 19.22 0 26.684c0 7.462 6.071 13.534 13.534 13.534H45.72c.326 2.763 1.36 5.62 3.507 6.508.382.16.841.276 1.364.276.994 0 2.22-.422 3.584-1.786 2.263-2.265 1.949-4.176 1.56-5.115z" mask="url(#b)"></path>
                            </g>
                            <path fill="#FE6F5F" d="M38.853 21 use JsonException;69v11.068a1.747 1.747 0 1 0 3.493 0V21.69a1.747 1.747 0 1 0-3.493 0"></path>
                        </g>
                    </svg></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=home">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=ingredients">Ajouter une recette</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=admin">
                                Administration</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>


    <h1 class="text-center">Administration des recettes</h1>
    <section class="container-sm">
        <div class="row">
            <div class="col-4">

                <table id="deleteRecette" class="table">
                    <thead>
                        <tr style="border: 1px solid black;">
                            <th scope="col" class="table-dark">id</th>
                            <th scope="col" class="table-dark">Nom </th>
                            <th scope="col" class="table-dark">Description</th>
                            <th scope="col" class="table-dark">Ingrédients</th>
                            <th scope="col" class="table-dark">Etape de la recette</th>
                            <th scope="col" class="table-dark">Temps de préparation</th>
                            <th scope="col" class="table-dark">Difficulté</th>
                            <th scope="col" class="table-dark">Type</th>
                            <th scope="col" class="table-dark">Date de création</th>
                            <th scope="col" class="table-dark">Image</th>
                            <th scope="col" class="table-dark">Supprimer</th>
                            <th scope="col" class="table-dark">Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--boucle pour afficher la liste des recettes présente en base de données-->
                        <?php foreach ($accueils as $accueil) : ?>
                            <tr>
                                <td class="table-danger"> <?= $accueil->getId() ?></td>
                                <td class="table-secondary"> <?= $accueil->getName() ?></td>
                                <td class="table-danger"> <?= substr($accueil->getDescription(), 0, 100) ?></td>
                                <td class="table-secondary"><?= substr($accueil->getIngredients(), 0, 100) ?></td>
                                <td class="table-danger"> <?= substr($accueil->getSteps(), 0, 100) ?></td>
                                <td class="table-secondary"> <?= $accueil->getTemps() ?></td>
                                <td class="table-danger"> <?= $accueil->getDifficulty() ?></td>
                                <td class="table-secondary"> <?= $accueil->getType() ?></td>
                                <td class="table-danger"> <?= $accueil->getCreated_at() ?></td>
                                <td class="table-secondary"> <img src="<?='upload/' . $accueil->getImage() ?>" alt="<?= $accueil->getName() ?>" width="100px" height="100px"></td>
                                <td><a class="btn btn-danger rounded" href="?page=delete_recette&id=<?= $accueil->getId() ?>">Supprimer</a></td>
                                <td><a class="btn btn-warning rounded" href="?page=update_recette&id=<?= $accueil->getId() ?>">modifier</a></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <footer class="d-flex flex-wrap justify-content-between align-items-center bg-dark py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <p class="text-white">Copyright &copy; 2022 - All rights reserved to Samir Yakhlef</p>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#twitter"></use>
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#instagram"></use>
                    </svg></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                        <use xlink:href="#facebook"></use>
                    </svg></a></li>
        </ul>
    </footer>
</body>

</html>