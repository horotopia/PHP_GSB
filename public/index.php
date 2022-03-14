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

$_REQUEST['login'] = "dandre";


if (isset($_GET['url'])) {
    echo "ici : ";
    $url = explode("/", $_GET['url']);
    $ctrl = $url[0];
    $act = $url[1] ?? NULL;
    $num = $url[2] ?? NULL;
} elseif ((!isset($_REQUEST['connectOk']))) {
    $ctrl = "login";
    $act = "view";
} else {$ctrl = "home";}
// var_dump($url);


switch ($ctrl) {
    case "home":
        (new HomeController)->view();
        break;
    case "saisie":
        // (new HomeController)->view();
        (new SaisieController)->view();
        break;
    case "affichage":
        // (new HomeController)->view();
        (new AffichageController)->view();
        break;
    case "login":
        (new LoginController)->$act();
        break;
}
// include "../src/views/".$ctrl.".php";



include '../src/views/footer.php';
