<?php

namespace Models;

use App\Connect;

class logModel
{

    public function logAsked($login,$mdp)
    {
        $params = [$login,$mdp];
        $data = (new Connect())->query("SELECT id,nom,prenom,role FROM visiteur WHERE login=? and mdp=?", $params)->fetch();
        return $data;
    }
}
