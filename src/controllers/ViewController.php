<?php
namespace Controllers;
use Controllers\NavController;

class ViewController
{
    protected function render($view, $params=[])
    {

      extract($params);

//     var_dump($selectedUser,$users);
//     die();



      ob_start();
        if (isset($_SESSION['idVisiteur']))
        {
          (new NavController)->view();
        }
        include "../src/views/$view.php";
        $contenu = ob_get_clean();
        include "../src/views/templates/default.php";
    }
}