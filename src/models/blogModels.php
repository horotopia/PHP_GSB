<?php
namespace Models;

class BlogModel
{

    public function data()
    {
        $data =(new Connect())->query('SELECT * FROM article');
        return $data;
    }
}