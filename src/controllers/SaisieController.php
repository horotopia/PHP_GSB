<?php
namespace Controllers;

use Models\saisieModel;
use Controllers\ViewController;


class SaisieController extends ViewController
{
    // ----- Utilitaires -----
    public function checkMonth()
    {
        if (!$data = (new saisieModel)->checkMonth())
        {
            (new saisieModel)->newMonth();
        }
    }

    public function getNomMoisFr(int $num_mois)
    {
        $moisfr = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'
        ];
        return $moisfr[$num_mois];
    }
        // ----- Fin Utilitaires -----
    // ----- Frais Forfait -----
    public function validFraisForfait()
    {
        foreach ($_POST['lesFrais'] as $frais)
        {
            if (!is_numeric($frais)) {
                (new ErrorController)->addError("Les valeurs des frais doivent être numériques");
                $this->view();
            }
        }
        $this->modifFraisForfait();
    }

    public function modifFraisForfait()
    {
        (new saisieModel)->FraisForfaitModif();
        $this->view();
    }
        // ----- Fin Frais Forfait -----
    // ----- Frais Hors Forfait -----
    public function checkErrorHF()
    {
        $date = explode("-", $_POST['dateFrais']);
        $jour = $date[2];
        $mois = $date[1];
        $annee = $date[0];

        if (!is_numeric($_POST['montant']))
        {
            (new ErrorController)->addError("Les montants doivent être numériques");
        } 
        elseif ($annee != date("Y") or $mois != date("m") or $jour > date("d"))
        {
            (new ErrorController)->addError("La date est invalide");
        }
        else {  (new saisieModel)->creeNouveauFraisHorsForfait();   }
        $this->view();
    }

    public function supprimerHF()
    {
        (new saisieModel)->supprimerFraisHorsForfait();
        $this->view();
    }
        // ----- Fin Frais Hors Forfait -----
    // ----- Vue -----
    public function view()
    {
    
        $this->checkMonth();
        $forfais = (new saisieModel)->vueFraisForfaitDuMois();
        $horsForfais = (new saisieModel)->vueFraisHorsForfaitDuMois();
        $mois=$this->getNomMoisFr(date('n')-1);

        $this->render('saisie',compact('forfais', 'horsForfais','mois'));
    }
        // ----- Fin Vue -----
}