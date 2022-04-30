<?php
namespace Controllers;

use Models\AdminModel;
use Controllers\ViewController;


class AdminController extends ViewController
{
    // ----- Vue -----
    public function view($info)
    {
        $users = (new AdminModel)->getUsers();
        $this->render($info,compact('users'));
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
}