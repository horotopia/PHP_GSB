<?php

namespace Models;

use App\Connect;

class consultModel
{
    private $mois;


    // ----- Construct -----
    public function __construct()
    {
        $this->mois=date('Ym');
    }
        // ----- Fin Construct -----
    // ----- Utilitaires -----
    public function checkFicheFraisMois()
    {
        if (!$data = (new Connect())->query("select mois from fichefrais")->fetchAll())
        {
            (new saisieModel)->newMonth();
            $data = (new Connect())->query("select mois from fichefrais")->fetch();
        }
  
        return $data;
    }
    public function vueFraisForfaitDemande($mois)
    {
        $params = [$_SESSION['idVisiteur'], $mois];
        $data = (new Connect())->query("select fraisforfait.id as idfrais, fraisforfait.libelle as libelle, 
		lignefraisforfait.quantite as quantite from lignefraisforfait inner join fraisforfait 
		on fraisforfait.id = lignefraisforfait.idfraisforfait
		where lignefraisforfait.idvisiteur =? and lignefraisforfait.mois=? 
		order by lignefraisforfait.idfraisforfait", $params)->fetchAll();
        return $data;
    }
    public function vueFraisHorsForfaitDemande($mois)
    {
        $params = [$_SESSION['idVisiteur'], $mois];
        $data = (new Connect())->query("select * from lignefraishorsforfait where lignefraishorsforfait.idvisiteur = ? 
		and lignefraishorsforfait.mois = ?", $params)->fetchAll();
        return $data;
    }
    public function vueEtatFiche($mois)
    {
        $params = [$_SESSION['idVisiteur'], $mois];
        $data = (new Connect())->query("select ficheFrais.idEtat as idEtat, ficheFrais.dateModif as dateModif, ficheFrais.nbJustificatifs as nbJustificatifs, 
			ficheFrais.montantValide as montantValide, etat.libelle as libEtat from  fichefrais inner join Etat on ficheFrais.idEtat = Etat.id 
			where fichefrais.idvisiteur = ? and fichefrais.mois = ?", $params)->fetch();

        return $data;
    }



}
?>