<?php
use Controllers\homeController;
use Controllers\SaisieController;
use Controllers\AffichageController;
use Controllers\LoginController;

include '../src/views/header.php';
require '../vendor/autoload.php';

var_dump($_GET);
// echo $url;

$login = 
if (isset($_POST['url'])) {
    $url = explode("/", $_GET['url']);
}
else (new LoginController)->view();

// var_dump($url);

$url = explode("/", $_GET['url'])??"home";

$ctrl = $url[0];
$act = $url[1]??NULL;
$num = $url[2]??NULL;

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
