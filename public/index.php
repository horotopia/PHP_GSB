<?php
use Controllers\homeController;
use Controllers\SaisieController;
use Controllers\ConsultController;
use Controllers\LoginController;
use Controllers\AdminController;

// include '../src/views/header.php';
require '../vendor/autoload.php';

// var_dump($_GET);
// echo $url;
// var_dump($_REQUEST);

session_start();
// $_SESSION['idVisiteur'] = 1;
// $_SESSION['nom'] = 'Andre';
// $_SESSION['prenom'] = 'David';

if (isset($_GET['url'])) {
    // echo "index : ";
    $url = explode("/", $_GET['url']);
    $ctrl = $url[0];
    $act = $url[1] ?? 'view';
    $info = $url[2] ?? NULL;
} else {
    $ctrl = "home";
    $act = "view";
}
// var_dump($_SESSION);
// var_dump( $ctrl);
// var_dump($act);

if($ctrl=="login" AND $act=='validConnection'){ (new LoginController)->$act();
}
elseif(!(new LoginController)->checkLog()){ 
    (new LoginController)->view();
}
elseif ($_SESSION['role'] == "Visiteur") {
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
            (new ConsultController)->$act();
            break;
        case "login":
            (new LoginController)->$act();
            break;
        case "deconnexion":
            (new LoginController)->deconnect();
            break;
        default :
            (new HomeController)->$act();
            break;
    }
}
elseif ($_SESSION['role'] == "Admin") {
    switch ($ctrl) {
        case "home":
            (new HomeController)->$act();
            break;
        case "login":
            (new LoginController)->$act();
            break;
        case "deconnexion":
            (new LoginController)->deconnect();
            break;
        case "admin":
            (new AdminController)->$act($info);
            break;
        default:
            (new HomeController)->$act();
            break;
    }
}
else {  (new HomeController)->$act();   }
// include "../src/views/".$ctrl.".php";



// include '../src/views/footer.php';
?>