<?php
namespace Controllers;

class HomeController extends ViewController
{

    public function view()
    {
        $this->render('home');
    }
}