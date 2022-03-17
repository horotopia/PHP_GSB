<?php
use Controllers\homeController;
use Controllers\SaisieController;
use Controllers\AffichageController;
use Controllers\LoginController;

include '../src/views/header.php';
require '../vendor/autoload.php';

// var_dump($_GET);
// echo $url;
// var_dump($_REQUEST);

// $_SESSION['nom'] = 'Andre';
// $_SESSION['prenom'] = 'David';


if (isset($_GET['url'])) {
    echo "ici : ";
    $url = explode("/", $_GET['url']);
    $_SESSION['ctrl'] = $url[0];
    $_SESSION['act'] = $url[1] ?? 'view';
    $_SESSION['num'] = $url[2] ?? NULL;
} 
// var_dump($url);
require_once '../src/views/login.php';
if ((!isset($_SESSION['idVisiteur']))) {
    $_SESSION['ctrl'] = "login";
    $_SESSION['act'] = "view";
} else {$_SESSION['ctrl'] = "home"; $_SESSION['act']="view";}


switch ($_SESSION['ctrl']) {
    case "home":
        (new HomeController)->$_SESSION['act']();
        break;
    case "saisie":
        // (new HomeController)->view();
        (new SaisieController)->$_SESSION['act']();
        break;
    case "affichage":
        // (new HomeController)->view();
        (new AffichageController)->$_SESSION['act']();
        break;
    case "login":
        (new LoginController)->$_SESSION['act']();
        break;
    case "deconnexion":
        (new LoginController)->deconnect();
        break;
}
// include "../src/views/".$ctrl.".php";



include '../src/views/footer.php';
