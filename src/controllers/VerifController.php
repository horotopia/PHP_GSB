<?php

namespace Controllers;


class VerifController
{
    public function check()
    {
        // var_dump($_SESSION);
        // die();
        if ((!isset($_SESSION['idVisiteur']))) 
        {
            header ('location:/Git%20GSB/public/login');
        }
    }
}

?>