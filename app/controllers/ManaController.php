<?php

namespace App\Controllers;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\JsonResponse;

class ManaController
{
    protected $request;
    protected $response;     

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->response = new JsonResponse();
    }
}