<h1>Coordonnées des utilisateurs :</h1>
<br>
<table border=1>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>CP</th>
        <th>ville</th>
        <th>Action</th>
    </tr>
    <?php

    foreach ($users as $user) {
        $id = $user['id'];
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $adresse = $user['adresse'];
        $cp = $user['cp'];
        $ville = $user['ville'];

        echo "<tr>
                <form action='admin/modifAddress' method='post'>
                    <input type='hidden' name='id' id='id' value='".$id."'>
                    <td>$nom</td>
                    <td>$prenom</td>
                    <td><input type=text name='adresse' id='adresse' value='".$adresse. "'></td>
                    <td><input type=text name='cp' id='cp' value='".$cp. "'></td>
                    <td><input type=text name='ville' id='ville' value='".$ville. "'></td>
                    <td><button type='submit'><img src='./images /pencil-square.svg' id='modif' alt='modif'/></button></td>
                </form>
            </tr>";
    }
    ?>
</table>