<?php

namespace Controllers;

class ErrorController
{
    public function addError($msg)
    {
        if (!isset($_REQUEST['erreurs'])) {
            $_REQUEST['erreurs'] = array();
        }
        $_REQUEST['erreurs'][] = $msg;
        echo "<div class ='erreur'>";
        echo "<ul>";

        foreach($_REQUEST['erreurs'] as $erreur)
	    {
            echo "<li>$erreur</li>";
	    }
        
        echo "</ul></div>";
    }
}
?>