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
    <title>Marmiton</title>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap based News, Magazine and Blog Theme">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
<script src="https://use.fontawesome.com/releases/vVERSION/js/all.js" data-auto-replace-svg="nest" defer></script>
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
                        <a class="nav-link active" aria-current="page" href="?page=home">Accueil</a>
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
                            <li><a class="dropdown-item" href="#"> <strong>Entrée</strong></a>
                            <li class="list-group-item"></li>
                            <li><a class="dropdown-item" href="#"><strong>Plats</strong></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><strong>Désserts</strong></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        </ul>
                </ul>

            </div>
        </div>
    </nav>


    <!-- Card item START -->
    <section class="position-relative pt-5">
        <div class="container ">
            <div class="row mx-5">
                <!-- Main Post START -->
                <div class="text-center">
                    <div class="row mx-5 ">
                        <!-- Card item START -->
                        <div class="col-10 mx-5">
                            <div class="card overflow-hidden">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="<?php echo $accueil['image'] ?>" alt="<?php echo $accueil['name'] ?>">
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h2 class="text-uppercase "><a href="#" class="btn-link text-reset fw-bolder"><?php echo $accueil['name'] ?></a></h2>
                                    <p class="text-uppercase fs-5"></i><?php echo $accueil['description'] ?></p>
                                    <ul class="d-flex justify-content-evenly fs-6" style="list-style-type:none; text-decoration: underline; color:darksalmon;">
                                        <li> <svg class="RCP__sc-1qnswg8-2 jTcJOx" xmlns="http://www.w3.org/2000/svg" width="27" height="32" viewBox="0 0 27 32">
                                                <path d="M13.207 22.759a2.151 2.151 0 1 0 0 4.302 2.151 2.151 0 0 0 0-4.302z"></path>
                                                <path d="M20.806 27.979a4.326 4.326 0 0 1-3.451 1.745H9.06a4.329 4.329 0 0 1-3.451-1.745c-1.57-2.108-2.651-4.777-3.127-7.613h21.451c-.475 2.837-1.556 5.505-3.127 7.613zM5.513 6.533c2.062-2.701 4.795-4.188 7.694-4.188s5.632 1.487 7.695 4.188c2.131 2.792 3.305 6.549 3.305 10.577 0 .35-.013.7-.031 1.049h-3.41v-4.683a1.103 1.103 0 1 0-2.206 0v4.683h-4.249v-4.683a1.103 1.103 0 1 0-2.206 0v4.683H7.857v-4.683a1.103 1.103 0 0 0-2.207 0v4.683H2.24a19.305 19.305 0 0 1-.032-1.049c0-4.029 1.174-7.785 3.306-10.577zm17.142-1.34C20.166 1.933 16.81.137 13.206.137S6.247 1.933 3.758 5.193C1.334 8.368-.001 12.6-.001 17.11c0 4.47 1.399 8.912 3.838 12.187a6.545 6.545 0 0 0 5.221 2.634h8.295a6.547 6.547 0 0 0 5.221-2.633c2.439-3.275 3.838-7.717 3.838-12.187 0-4.51-1.335-8.742-3.759-11.917z"></path>
                                            </svg> Temps de préparation:<?php echo $accueil['temps'] ?></li>
                                        <li> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                <path d="M14.675 15.867c0-.607-.498-1.098-1.111-1.098H2.736c-.613 0-1.111.491-1.111 1.097s.498 1.097 1.111 1.097h10.827c.613 0 1.111-.491 1.111-1.097l.001.001zm-10.586 3.45c-.614 0-1.111.491-1.111 1.097s.497 1.098 1.111 1.098h7.309c.613 0 1.11-.492 1.11-1.098s-.497-1.097-1.11-1.097H4.089zm16.243-8.562c-.613 0-1.11.491-1.11 1.097v6.421c0 .606.497 1.097 1.11 1.097h4.873c.613 0 1.11-.491 1.11-1.097s-.497-1.097-1.11-1.097h-3.762v-5.325c0-.606-.498-1.097-1.111-1.097z"></path>
                                                <path d="M21.442 6.528V4.657h1.867c.613 0 1.111-.491 1.111-1.098s-.498-1.097-1.111-1.097h-5.956c-.613 0-1.11.491-1.11 1.097s.497 1.098 1.11 1.098h1.867v1.871a11.694 11.694 0 0 0-7.515 3.693H1.109c-.613 0-1.11.491-1.11 1.097s.497 1.097 1.11 1.097h11.099c.329 0 .641-.144.852-.393a9.489 9.489 0 0 1 7.269-3.352c5.209 0 9.447 4.188 9.447 9.336s-4.238 9.336-9.447 9.336a9.493 9.493 0 0 1-7.023-3.113 1.119 1.119 0 0 0-.827-.365H1.108c-.613-.001-1.11.491-1.11 1.097s.497 1.097 1.11 1.097h10.889a11.734 11.734 0 0 0 8.332 3.478c6.434 0 11.669-5.173 11.669-11.532 0-5.989-4.643-10.924-10.557-11.478z"></path>
                                            </svg>  Type de recette: <?php echo $accueil['type'] ?></li>
                                    </ul>
                                    <ul style="list-style-type:none;">
                                        <?php foreach (explode(",", $accueil['ingredients']) as $ingredient) : ?>
                                            <li><?php echo $ingredient ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                    <!--affiche les étapes de la recette-->
                                    <ol>
                                        <?php foreach (explode(".", $accueil['steps']) as $step) : ?>
                                            <li><?php echo $step ?></li>
                                        <?php endforeach ?>
                                    </ol>
                                            <p class="text-uppercase"></p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item fs-5"><?php echo $accueil['created_at'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Card item END -->

    <!-- =======================
JS libraries, plugins and custom scripts -->

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendors -->
    <script src="assets/vendor/sticky-js/sticky.min.js"></script>

    <!-- Template Functions -->
    <script src="assets/js/functions.js"></script>
</body>

</html>