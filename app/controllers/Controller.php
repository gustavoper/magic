<?php

namespace App\Controllers;

class Controller extends ManaController
{

    /**
     * [hello description]
     * @param  [type] $params [description]
     * @return null
     */
    public function hello($params)
    {
        if (isset($params['name'])) {
            return print_r("Welcome to Magic, ".$params['name']);
        }

        return print_r("Welcome to Magic, young Wizard!");
    }

    public function postTest()
    {
        $json = json_decode($this->request->getContent());
        $this->response->setData($json);
        $this->response->send();
    }
}