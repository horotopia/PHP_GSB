<?php

namespace Controllers;
use Models\logModel;
use Controllers\ErrorController;


class LoginController
{    
    public function view()
    {
        echo "vue";
        include "../src/views/login.php";
    }

    public function check()
    {
        if ((!isset($_SESSION['idVisiteur']))) 
        {
            header ('location:/Git%20GSB/public/login');
        }
    }

    public function validConnection()
    {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $visiteur = (new logModel)->logAsked($login, $mdp);
        if (!is_array($visiteur)) {
            (new ErrorController)->addError("Login ou mot de passe incorrect ");
            $this->view();
        } else {
            $_SESSION['idVisiteur'] = $visiteur['id'];
            $_SESSION['nom'] =  $visiteur['nom'];
            $_SESSION['prenom'] = $visiteur['prenom'];
            header ('location:../home/view');
        }
    }
    public function deconnect()
    {
        session_unset();
        (new VerifController)->check();
    }
}
