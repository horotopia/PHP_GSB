<?php
use Controllers\homeController;
use Controllers\SaisieController;
use Controllers\AffichageController;
use Controllers\LoginController;

include '../src/views/header.php';
require '../vendor/autoload.php';

// var_dump($_GET);
// echo $url;


if (!isset($_POST['login'])) {
    (new LoginController)->view();
    $ctrl = "";
}
// var_dump($url);

if (isset($_GET['url'])){
    $url = explode("/", $_GET['url']) ?? $ctrl = "";
    $ctrl = $url[0];
    $act = $url[1] ?? NULL;
    $num = $url[2] ?? NULL;
}


switch ($ctrl) {
    case "":
        (new HomeController)->view();
        break;
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
}
// include "../src/views/".$ctrl.".php";



include '../src/views/footer.php';
