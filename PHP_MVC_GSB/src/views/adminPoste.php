<h1>Poste des utilisateurs</h1>
<br>
<table border=1>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Embauche</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <tr>
        <form action="admin/ajoutPoste" method="post">

            <td><input type=text name="nom" id="nom"></td>
            <td><input type=text name="prenom" id="prenom"></td>
            <td><input type=text name="dateEmbauche" id="dateEmbauche"></td>
            <td><input type=text name="role" id="role"></td>
            <td><input type="submit" value="ajouter"></td>
        </form>
    </tr>
    <?php
    foreach ($users as $user) {
        $id = $user['id'];
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $dateEmbauche = $user['dateEmbauche'];
        $role = $user['role'];

        echo "<tr>
                <form action='admin/modifPoste' method='post'>
                    <input type='hidden' name='id' id='id' value='" . $id . "'>
                    <td><input type=text name='nom' id='nom' value='" . $nom . "'></td>
                    <td><input type=text name='prenom' id='prenom' value='" . $prenom . "'></td>
                    <td><input type=text name='dateEmbauche' id='dateEmbauche' value='" . $dateEmbauche . "'></td>
                    <td><input type=text name='role' id='role' value='" . $role . "'></td>
                    <td><button type='submit'><img src='./images/pencil-square.svg' id='modif' alt='modif'/></button>
                    </form>
                    <button><a href='admin/supprPoste/" . $id . "'><img src='images/trash.svg'></a></button></td>
                </tr>";
    }
    ?>
</table>