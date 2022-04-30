    <!-- Division pour le sommaire -->
    <div id="menuGauche">
        <div id="infosUtil">

            <h2>

            </h2>

        </div>
        <ul id="menuList">
            <li>
                Visiteur :<br>
                <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom']  ?>
            </li>
            <br>
            <li>
                <?php 
                // var_dump($date);
                // die();
                echo $date; 
                ?>
            </li>
            <br>

            <?php
            // var_dump($menu);
            // die();
            foreach ($menu as $me) {
                echo "<li class='smenu'>
                        <a href='".$me['menuHref']."' title='".$me['menuTitle']."'> ".$me['menuTitle']."</a>
                    </li><br>";
            }
            ?>

            <li class="smenu">
                <a href="deconnexion" title="Se déconnecter">Déconnexion</a>
            </li>
        </ul>

    </div>