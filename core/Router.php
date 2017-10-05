<?php

namespace Core;

class Router
{
    public function __construct($req, $res) 
    {
        $match = $this->matchMaker();

        if ($match == false) {
			$this->routeError($res, 404);
		}
		else {
            list($controller, $action) = explode('@', $match['target']);
            $obj = $this->controllerMaker($controller);            
            if (is_callable(array($obj, $action))) {
                $obj->{$action}($req, $res, $match['params']);
            } else {
                $this->routeError($res, 500);
            }
        }
    }

    public function routeError($res, $code)
    {
        $res->headers->set('Content-Type', 'application/json');
        
        if ($code == 404)
        {
            $message = 'Route not found';
        } else {
            $message = 'Ops, you don\'t have mana'; 
        }
        $res->setStatusCode($code);
        $res->setContent(
            json_encode([
                'type' => 'error',
                'message' => $message
            ])
        );
        return $res->send();
    }

    public function matchMaker()
    {
        $router = new \AltoRouter();
        include '../routes/route.php';
        return $router->match();
    }

    public function controllerMaker($controller)
    {
        $controller = 'App\\Controllers\\'.$controller;
        return new $controller;
    }
}