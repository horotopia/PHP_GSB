<?php

namespace Controllers;
use Models\logModel;
use Controllers\ErrorController;


class LoginController extends ViewController
{    
    public function view()
    {
        $this->render('login');
        // include "../src/views/login.php";
    }

    public function checkLog()
    {
        
       if (!isset($_SESSION['idVisiteur'])) {return false; }
       else
       {
           if ($_SESSION['timeBeforeLogOut'] < $_SERVER['REQUEST_TIME'])
           { 
               (new ErrorController)->addError("le temps de connexion est dépassé.");
                $this->deconnect();
           }
           $this->timer(600);
           return true;
        }
    }

    public function timer(int $time)
    {
        $_SESSION['timeBeforeLogOut'] = $_SERVER['REQUEST_TIME']+$time;
    }

    public function validConnection()
    {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $visiteur = (new logModel)->logAsked($login, $mdp);
        if (!is_array($visiteur)) {
            (new ErrorController)->addError("Login ou mot de passe incorrect");
            (new LoginController)->view();
        } else {
            $_SESSION['idVisiteur'] = $visiteur['id'];
            $_SESSION['nom'] = $visiteur['nom'];
            $_SESSION['prenom'] = $visiteur['prenom'];
            $_SESSION['role'] = $visiteur['role'];
            $this->timer(600);
            header('location:../home');
        }
    }
    public function deconnect()
    {
        session_unset();
        header('location:home');
    }
}
