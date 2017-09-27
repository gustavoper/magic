<?php

namespace App\Controllers;

class Controller
{

    public function hello($params)
    {
        if (isset($params['name'])) {
            return print_r("Welcome to Magic, ".$params['name']);
        }

        return print_r("Welcome to Magic, young Wizard!");
    }
}