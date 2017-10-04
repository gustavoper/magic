<?php

namespace Core;
function routeError()
{
	header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
	header('Content-Type: application/json');
	print_r(json_encode([
		'type' => 'error',
		'message' => 'Hey, your route wasn\'t found!'
	]));
}
class Router
{
    public function __construct() 
    {
        $router = new \AltoRouter();
        include '../routes/route.php';
        $match = $router->match();

        if ($match == false) {
			routeError();
		}
		else {

            list($controller, $action) = explode('@', $match['target']);
            $controller = 'App\\Controllers\\'.$controller;
            $obj = new $controller;
            if (is_callable(array($obj, $action))) {
                call_user_func_array(array($obj, $action), array($match['params']));
            } else {
                
                header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
                header('Content-Type: application/json');
                
                print_r(json_encode([
                    'type' => 'error',
                    'message' => 'Ops! Something is wrong!'
                ]));
            }
        }
    }
}