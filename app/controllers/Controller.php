<?php

namespace App\Controllers;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function hello(Request $req, Response $res, $params)
    {
        if (isset($params['name'])) {
            $res->setData([
                'type' => 'magic',
                'spell'=> "Welcome to Magic, ".$params['name']
            ]);
            return $res->send();
        }
        $res->setData([
            'type' => 'magic',
            'spell'=> "Welcome to Magic, young wizard"
        ]);
        return $res->send();
    }
}