<?php

namespace Controllers;
use Models\logModel;
use Controllers\ErrorController;


class NavController extends ViewController
{    
    public function view()
    {
        $month = (new SaisieController)->getNomMoisFr(date('n'));
        $date = date("j")." ".$month." ".date("Y");

        switch($_SESSION['role']) {
            case "Visiteur":
                $menu = [["menuHref"=>"saisie","menuTitle"=> "saisie fiche de frais"], ["menuHref" => "affichage", "menuTitle" => "Mes fiches de frais"]];
                break;

            case "Admin":
                $menu = [["menuHref"=> "admin/view/adminPoste","menuTitle"=> "Poste"], ["menuHref" => "admin/view/adminLogin", "menuTitle" => "Login"], ["menuHref" => "admin/view/adminAddr", "menuTitle" => "Coordonnées"]];
                break;
            default:
                $menu = [["menuHref"=> "home/view","menuTitle"=> ""]];
                break;
        }
        include "../src/views/nav.php";
    }
}