<div id="contenu">
    <h2>Mes fiches de frais</h2>
    <h3>Mois à sélectionner : </h3>
    <form action="affichage/view" method="post">
        <div class="corpsForm">

            <p>

                <label for="lstMois" accesskey="n">Mois : </label>
                <select id="lstMois" name="lstMois">
                    <?php
                    $moisASelectionner = $mois;
                    foreach ($lesMois as $unMois) {
                        $ceMois     =  $unMois['mois'];
                        $numAnnee =  substr($ceMois, 0, 4);
                        $numMois  =  substr($ceMois, 4, 2);
                        if ($ceMois == $moisASelectionner) {
                    ?>
                            <option selected value="<?php echo $ceMois ?>"><?php echo  $numMois . "/" . $numAnnee ?> </option>
                        <?php
                        } else { ?>
                            <option value="<?php echo $ceMois ?>"><?php echo  $numMois . "/" . $numAnnee ?> </option>
                    <?php
                        }
                    }

                    ?>

                </select>
            </p>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
            </p>
        </div>

    </form>
    <?php

    $ceMois = 0;
    if (isset($mois)) {       
         ?>
        <h3>Fiche de frais du mois de <?php echo $moisFr. " " . $numAnnee ?> :
        </h3>
        <div class="encadre">
            <p>
                Etat : <?php echo $etatFiche['libEtat'] ?> depuis le <?php echo $etatFiche['dateModif'] ?> <br> Montant validé : <?php echo $etatFiche['montantValide'] ?>


            </p>
            <table class="listeLegere">
                <caption>Eléments forfaitisés </caption>
                <tr>
                    <?php
                    foreach ($forfais as $unFraisForfait) {
                        $libelle = $unFraisForfait['libelle'];
                    ?>
                        <th> <?php echo $libelle ?></th>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <?php
                    foreach ($forfais as $unFraisForfait) {
                        $quantite = $unFraisForfait['quantite'];
                    ?>
                        <td class="qteForfait"><?php echo $quantite ?> </td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
            <table class="listeLegere">
                <caption>Descriptif des éléments hors forfait -<?php echo $etatFiche['nbJustificatifs'] ?> justificatifs reçus -
                </caption>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>
                    <th class='montant'>Montant</th>
                </tr>
                <?php
                foreach ($horsForfais as $unFraisHorsForfait) {
                    $date = $unFraisHorsForfait['date'];
                    $libelle = $unFraisHorsForfait['libelle'];
                    $montant = $unFraisHorsForfait['montant'];
                ?>
                    <tr>
                        <td><?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
</div>
<?php } ?>