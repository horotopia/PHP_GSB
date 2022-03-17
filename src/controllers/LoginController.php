<?php

namespace Controllers;
use Models\logModel;
use Controllers\ErrorController;


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
            (new ErrorController)->addError("Login ou mot de passe incorrect");
            (new LoginController)->view();
        } else {
            $_SESSION['idVisiteur'] = $visiteur['id'];
            $_SESSION['nom'] =  $visiteur['nom'];
            $_SESSION['prenom'] = $visiteur['prenom'];
        }
    }
    public function deconnect()
    {
        session_destroy();
        header ('location:index.php?login/wiew');
    }
}
