<h1>Login des utilisateurs :</h1>
<br>
<table border=1>
    <tr>
        <th>Nom Prenom</th>
        <th>Action</th>
    </tr>
    <tr>
        <form action='admin/searchUser' method='post'>
            <td><select name='nom' id='nom'>
                <?php
                foreach ($users as $user) {
                    $id = $user['id'];
                    $nom = $user['nom'];
                    $prenom = $user['prenom'];?>?>

                    <option value="<?php echo $nom." ".$prenom;?>"><?php echo $nom." ".$prenom;?> </option>

                <?php   } ?>
            </select></td>
            <td><input type='submit' value='chercher' </td>
        </form>
    </tr>
</table>
    <?php   if ($selectedUser!=null) {    ?>
        <table border=1>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Login</th>
                <th>Mdp (1)</th>
                <th>Mdp (2)</th>
                <th>Action</th>
            </tr>
    <?php
        foreach ($selectedUser as $user) {
            $id = $user['id'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $login = $user['login'];

            echo "<tr>
                <form action='admin/modifLogPwd' method='post'>
                    <input type='hidden' name='id' id='id' value='" . $id . "'>
                    <td>$nom</td>
                    <td>$prenom</td>
                    <td><input type=text name='login' id='login' value='" . $login . "'></td>
                    <td><input type=text name='mdp1' id='mdp1'></td>
                    <td><input type=text name='mdp2' id='mdp2'></td>
                    <td><button type='submit'><img src='./images/pencil-square.svg' id='modif' alt='modif'/></button>
                    </form>
                </tr>";
        }   ?>
    </table>
    <?php   }   ?>
