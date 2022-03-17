<?php

namespace Models;

class logModel
{

    public function logAsked($login,$mdp)
    {
        $data = (new Connect())->query("SELECT id,nom,prenom FROM visiteur WHERE 'login'=".$login." and 'mdp'=".$mdp." ");
        return $data;
    }
}
