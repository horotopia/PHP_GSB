<div id="contenu">
    <!-- Frais Forfaits -->
    <h2>Renseigner ma fiche de frais du mois de <?php echo $mois; ?></h2>

    <form method="POST" action="saisie/validFraisForfait">
        <div class="corpsForm">

            <fieldset>
                <legend>Eléments forfaitisés
                </legend>
                <?php
                foreach ($forfais as $tab) {
                    $idFrais = $tab['idfrais'];
                    $libelle = $tab['libelle'];
                    $quantite = $tab['quantite'];
                ?>
                    <p>
                        <label for="idFrais"><?php echo $libelle ?></label>
                        <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais ?>]" size="10" maxlength="5" value="<?php echo $quantite ?>">
                    </p>

                <?php
                }
                ?>
            </fieldset>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
            </p>
        </div>
    </form>
    <!-- Fin Frais Forfaits -->
    <!-- Frais Hors Forfaits -->

    <table class="listeLegere">
        <h2>Descriptif des éléments hors forfait</h2>
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class="montant">Montant</th>
            <th class="action">&nbsp;</th>
        </tr>

        <?php
        foreach ($horsForfais as $tabHF) {
            $libelle = $tabHF['libelle'];
            $date = $tabHF['date'];
            $montant = $tabHF['montant'];
            $id = $tabHF['id'];
        ?>
            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <form action="saisie/supprimerHF" method="post">
                    <input id="id" name="id" type=hidden value=<?php echo $id ?>>
                    <td><input id="Supprimer" name="Supprimer" type="submit" value="Supprimer" size="20" onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');" /></td>
                </form>
            </tr>
        <?php } ?>

    </table>

    <form action="saisie/checkErrorHF" method="post">
        <div class="corpsForm">

            <fieldset>
                <legend>Nouvel élément hors forfait
                </legend>
                <p>
                    <label for="txtDateHF">Date (jj/mm/aaaa): </label>
                    <input type="date" id="DateHF" name="dateFrais" size="10" maxlength="10" value="" />
                </p>
                <p>
                    <label for="txtLibelleHF">Libellé</label>
                    <input type="text" id="txtLibelleHF" name="libelle" size="70" maxlength="256" value="" />
                </p>
                <p>
                    <label for="txtMontantHF">Montant : </label>
                    <input type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" />
                </p>
            </fieldset>
        </div>
        <div class="piedForm">
            <p>
                <input id="ajouter" type="submit" value="Ajouter" size="20" />
            </p>
        </div>

    </form>
</div>
<!-- Fin Frais Hors Forfais -->