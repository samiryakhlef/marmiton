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
//j'instancie un variable qui contiendra la route demandée
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous" defer></script>
    <title>Marmiton</title>
</head>

<body>
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
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=ingredients">Ajouter une recette</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=admin">
                            Administration</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Recettes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php?type=1"> <strong>Entrée</strong></a>
                            <li class="list-group-item"></li>
                            <li><a class="dropdown-item" href="index.php?type=2"><strong>Plats</strong></a>
                            </li>
                            <li><a class="dropdown-item" href="index.php?type=3"><strong>Désserts</strong></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit" id="select">recherche</button>
                    <select class="form-select" id="floatingSelect" name="select" aria-label="Floating label select example">
                        <option value="1" <?php if ($order == 1) {
                                                echo 'research';
                                            } ?>>Décroissant</option>
                        <option value="2" <?php if ($order == 2) {
                                                echo 'research';
                                            } ?>>Croissant</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>
    <!------------------liste des recettes -------------------->
    <h1 class="titlerecipe text-center">Liste des recettes</h1>

    <!------------------Afficher des recettes-------------------->
    <div class="container d-flex flex-wrap justify-content-center">
        <?php foreach ($accueils as $accueil) : ?>
            <div class="card m-4 rounded shadow-lg" style="width: 18rem;">
                <a href="?page=edit-recette&id=<?= $accueil->getId() ?>"><img src="https://picsum.photos/seed/picsum/200/300" class="card-img-top" alt="..." style="width: 100% ;height: 200px;"></a>
                <div class="card-body">
                    <h5 class="card-title text-center text-capitalize"><?= $accueil->getName() ?></h5>
                    <h6 class="card-title text-center text-uppercase"><?= $accueil->getType() ?></h6>
                    <ul class="d-flex justify-content-evenly" style="list-style:none;">
                        <!----------------------fenetre pop ingédients--------------->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline" style=" color:rgb(254, 111, 95);" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Ingrédients
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ingredients de la recette</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>

                    <p class="text-center"> <?= $accueil->getTemps() ?></p>
                    <p class="text-center"> <?= $accueil->getDescription() ?></p>
                    <p class="text-center"> <?= $accueil->getCreated_At() ?></p>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
    <!------------------Pagination -------------------->
    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="?p=<?= $currentPage - 1 ?>&search=<?= $research ?>&order=<?= $order ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="?p=<?= $page ?>&search=<?= $research ?>&order=<?= $order ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="?p=<?= $currentPage + 1 ?>&search=<?= $research ?>&order=<?= $order ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>
</body>

</html>