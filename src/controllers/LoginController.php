<?php

namespace Controllers;
use Models\logModel;


class LoginController
{    
    public function view()
    {
        include "../src/views/login.php";
    }

    public function validConnection()
    {
        $login = $_REQUEST['login'];
        $mdp = $_REQUEST['mdp'];
        $visiteur = (new logModel)->logAsked($login, $mdp);
        if (!is_array($visiteur)) {
            ajouterErreur("Login ou mot de passe incorrect");
            include("vues/v_erreurs.php");
            include("vues/v_connexion.php");
        } else {
            $id = $visiteur['id'];
            $nom =  $visiteur['nom'];
            $prenom = $visiteur['prenom'];
            connecter($id, $nom, $prenom);
            include("vues/v_sommaire.php");
        }
    }
}
