<?php
namespace Controllers;

use Models\consultModel;

class ConsultController extends ViewController
{

    public function view()
    {
        
        $lesMois = (new consultModel)->checkFicheFraisMois();
        if (isset($_POST['lstMois']))
        {
            $mois = $_POST['lstMois'];
        
            $etatFiche = (new consultModel)->vueEtatFiche($mois);
            $forfais = (new consultModel)->vueFraisForfaitDemande($mois);
            $horsForfais = (new consultModel)->vueFraisHorsForfaitDemande($mois);
            $moisFr = (new SaisieController)->getNomMoisFr(date('n') - 1);
            $this->render('consult', compact('lesMois','mois','moisFr','forfais','horsForfais','etatFiche'));
        }
        else {
            $this->render('consult', compact('lesMois'));
        }
    }
}