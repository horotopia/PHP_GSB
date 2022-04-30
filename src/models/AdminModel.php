<?php

namespace Models;

use App\Connect;
use Controllers\AdminController;

class AdminModel
{
    private $mois;


    // ----- Getter -----
    public function getUsers()
    {
        $data = (new Connect())->query("SELECT * FROM visiteur")->fetchAll();
        return $data;
    }
        // ----- Fin Getter -----
    // ----- Modif -----
    public function modifUserAddr()
    {
        $params = [$_POST['adresse'], $_POST['cp'], $_POST['ville'],$_POST['id']];
        $data = (new Connect())->query("UPDATE visiteur SET adresse=?, cp=?, ville=? WHERE id=?",$params);
    }
    public function modifUserPoste()
    {
        $params = [$_POST['nom'], $_POST['prenom'], $_POST['dateEmbauche'], $_POST['role'], $_POST['id']];
        $data = (new Connect())->query("UPDATE visiteur SET nom=?, prenom=?, dateEmbauche=?, role=? WHERE id=?",$params);
    }
    // ----- Fin Modif -----
    // ----- Ajout -----
    public function ajoutUserPoste()
    {
        $id = (new AdminController)->newIdVisiteur();
        $params = [$id, $_POST['nom'], $_POST['prenom'], $_POST['dateEmbauche'], $_POST['role']];
        $data = (new Connect())->query("INSERT INTO `visiteur`(`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `role`) VALUES (?, ?, ?,NULL,NULL,NULL,NULL,NULL,? ,?)",$params);
        // $data = (new Connect())->query("INSERT INTO visiteur (id, nom, prenom, dateEmbauche, `role`) SET id=?, nom=?, prenom=?, dateEmbauche=?, `role`=?", $params);
    }
    // ----- Fin Ajout -----
    // ----- Suppr -----
    public function supprUserPoste($id)
    {
        $params = [$id];
        $data = (new Connect())->query("DELETE FROM visiteur WHERE id=?", $params);
    }
        // ----- Fin Suppr -----
    
        //----- Check -----
    public function checkIfExist($newIdVisiteur)
    {
        $params = [$newIdVisiteur];
        $data = (new Connect())->query("SELECT id FROM visiteur where id=?",$params)->fetch();
        return $data;
    }
}
?>