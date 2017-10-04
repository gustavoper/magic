<?php

namespace Core;

class Router
{
    public function __construct() 
    {
        $router = new \AltoRouter();
        include '../routes/route.php';
        $match = $router->match();

        if ($match == false) {
			$this->routeError('Hey, your route wasn\'t found!');
		}
		else {

            list($controller, $action) = explode('@', $match['target']);
            $controller = 'App\\Controllers\\'.$controller;
            $obj = new $controller;
            if (is_callable(array($obj, $action))) {
                call_user_func_array(array($obj, $action), array($match['params']));
            } else {
                routeError('Oops! Something is wrong!');
            }
        }
    }

    public function routeError($message)
    {
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        header('Content-Type: application/json');
        print_r(json_encode([
            'type' => 'error',
            'message' => $message
        ]));
    }
}