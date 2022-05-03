<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
<!--    <base href="/PHP_GSB/public/" /> //maison-->
    <base href="/ProgEnPHP/PHP_MVC_GSB/public/" /> <!-- //ecole -->
    <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="./css/styles.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
</head>

<body>
    <div id="page">
        <!-- Entête -->
        <div id="entete">
            <img src="./images/logo.jpg" id="logoGSB" alt="Laboratoire Galaxy-Swiss Bourdin" title="Laboratoire Galaxy-Swiss Bourdin" />
            <h1>Suivi du remboursement des frais</h1>
        </div>
        <!-- Fin Entête -->

        <!-- Contenu de page -->
        <?php echo $contenu ?>
        <!-- Fin Contenu de page -->

        <!-- Division pour le pied de page -->
    </div>
</body>

</html>