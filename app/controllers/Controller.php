<?php

namespace App\Controllers;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function hello(Request $req, Response $res, $params)
    {
        if (isset($params['name'])) {
            return print_r("Welcome to Magic, ".$params['name']);
        }

        return print_r("Welcome to Magic, young Wizard!");
    }
}