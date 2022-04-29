<?php

namespace Models;

use App\Connect;

class saisieModel
{
    private $mois;


    // ----- Construct -----
    public function __construct()
    {
        $this->mois=date('Ym');
    }
        // ----- Fin Construct -----
    // ----- Utilitaires -----
    public function checkMonth()
    {
        $params = [$this->mois];
        if ($data = (new Connect())->query("select mois from lignefraisforfait where mois = ?", $params)->fetchAll())
        {
            return true;
        } else {
            return false;
        }
    }
    public function newMonth()
    {
        $id = $_SESSION['idVisiteur'];
        $mois=$this->mois;
        $moisDernier = $mois-1;
        $params = [$id, $mois];

        $data=new Connect();
        if ($data->query("select * from fichefrais where mois = ".$moisDernier)->fetchAll())
        {   $data->query("UPDATE fichefrais SET idEtat = 'CL' WHERE mois = ".$moisDernier); }
        $data->query("insert into fichefrais values (?, ?, 0, 0, now() , 'CR')",$params);
        $data->query("insert into lignefraisforfait values (?, ?, 'ETP', 0)",$params);
        $data->query("insert into lignefraisforfait values (?, ?, 'KM', 0)", $params);
        $data->query("insert into lignefraisforfait values (?, ?, 'NUI', 0)",$params);
        $data->query("insert into lignefraisforfait values (?, ?, 'REP', 0)",$params);
    }
        // ----- Fin Utilitaires -----
    // ----- Frais Forfait -----
    public function vueFraisForfaitDuMois()
    {
        $params = [$_SESSION['idVisiteur'], $this->mois];
        $data = new Connect();
        if (!$data->query("SELECT * FROM lignefraisforfait WHERE idvisiteur = ?",[$_SESSION['idVisiteur']])->fetch())
        {   $this->newMonth();  }
        // var_dump($data);
        $data = (new Connect())->query("select fraisforfait.id as idfrais, fraisforfait.libelle as libelle, 
		lignefraisforfait.quantite as quantite from lignefraisforfait inner join fraisforfait 
		on fraisforfait.id = lignefraisforfait.idfraisforfait
		where lignefraisforfait.idvisiteur =? and lignefraisforfait.mois=? 
		order by lignefraisforfait.idfraisforfait", $params)->fetchAll();
        // var_dump($data);
        // die();
        return $data;
    }

    public function FraisForfaitModif()
    {
        $lesFrais = $_POST['lesFrais'];
        $lesCles = array_keys($lesFrais);
        foreach ($lesCles as $unIdFrais) {
            $mois = date('Ym');
            $qte = $lesFrais[$unIdFrais];
            $params = [$qte, $_SESSION['idVisiteur'], $mois, $unIdFrais];
            $data = (new Connect())->query("update lignefraisforfait set quantite = ?
			where idvisiteur = ? and mois = ? and idfraisforfait = ?", $params);
        }
    }
        // ----- Frais Forfait -----
    // ----- Frais Hors Forfait -----
    public function vueFraisHorsForfaitDuMois()
    {
        $params = [$_SESSION['idVisiteur'],$this->mois];
        $data = (new Connect())->query("select * from lignefraishorsforfait where lignefraishorsforfait.idvisiteur = ? 
		and lignefraishorsforfait.mois = ?",$params)->fetchAll();
        return $data;
    }

    public function creeNouveauFraisHorsForfait()
    {
        $params = [$_SESSION['idVisiteur'],$this->mois,$_POST['libelle'], $_POST['dateFrais'], $_POST['montant']];
        $data = (new Connect())->query("insert into lignefraishorsforfait (idVisiteur, mois, libelle, date, montant) values(?, ?, ?, ?, ?)",$params);
    }

    public function supprimerFraisHorsForfait()
    {
        $params = [$_POST['id']];
		$data = (new Connect())->query("delete from lignefraishorsforfait where lignefraishorsforfait.id =? ", $params);
    }
        // ----- Fin Frais Hors Forfait -----
}

