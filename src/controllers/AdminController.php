<?php
namespace Controllers;

use Models\AdminModel;
use Controllers\ViewController;


class AdminController extends ViewController
{
    // ----- Vue -----
    public function view($info,$selectedUser=[])
    {
        $selectedUser;
        $users = (new AdminModel)->getUsers();
        $this->render($info,compact('selectedUser','users'));
    }
        // ----- Fin Vue -----

    // ----- Modification -----
    public function modifAddress()
    {
        (new AdminModel)->modifUserAddr();
        $this->view("adminAddr");
    }
    public function modifPoste()
    {
        (new AdminModel)->modifUserPoste();
        $this->view("adminPoste");
    }
    public function ajoutPoste()
    {
        (new AdminModel)->ajoutUserPoste();
        $this->view("adminPoste");
    }
    public function supprPoste($id)
    {
        (new AdminModel)->supprUserPoste($id);
        $this->view("adminPoste");
    }
    public function newIdVisiteur()
    {
        if (!isset($data))
            $data=null;
        while ($data == null) {
            $newIdVisiteur = "f" . rand(000, 999);
            $data = (new AdminModel)->checkIfExist($newIdVisiteur);
            if ($data == false) {
                return $newIdVisiteur;
            }
        } 
    }
    public function searchUser() {
        $params = explode(" ",$_POST['nom']);
//        $params = [$tab[0],$tab[1]];
        $selectedUser = (new AdminModel)->searchUser($params);
        $this->view("adminLogin",$selectedUser);
    }
    public function modifLogPwd() {
        if ($_POST['mdp1']==$_POST['mdp2']) {
            (new AdminModel)->modifLogPwd();
        } else {
            (new ErrorController)->addError("Les mots de passe sont différents");
        }
        $this->view('adminLogin');
    }
}