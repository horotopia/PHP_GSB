<?php
use Controllers\homeController;
use Controllers\SaisieController;
use Controllers\AffichageController;
use Controllers\LoginController;
use Controllers\VerifController;

include '../src/views/header.php';
require '../vendor/autoload.php';

// var_dump($_GET);
// echo $url;
session_start();
var_dump($_SESSION);

// $_SESSION['idVisiteur'] = 1;
// $_SESSION['nom'] = 'Andre';
// $_SESSION['prenom'] = 'David';


if (isset($_GET['url'])) {
    echo "ici : ";
    $url = explode("/", $_GET['url']);
    $ctrl = $url[0];
    $act = $url[1] ?? 'view';
    $num = $url[2] ?? NULL;
} else {
    $ctrl = "home";
    $act = "view";
}
// var_dump($url);
if ($ctrl != 'login')
{
    (new LoginController)->check();
}


switch ($ctrl) {
    case "home":
        (new HomeController)->$act();
        break;
    case "saisie":
        // (new HomeController)->view();
        (new SaisieController)->$act();
        break;
    case "affichage":
        // (new HomeController)->view();
        (new AffichageController)->$act();
        break;
    case "login":
        (new LoginController)->$act();
        break;
    case "deconnexion":
        (new LoginController)->deconnect();
        break;
}
// include "../src/views/".$ctrl.".php";



include '../src/views/footer.php';
