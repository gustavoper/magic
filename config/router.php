<?php

$router = new \AltoRouter();
include '../routes/route.php';
$match = $router->match();

if ($match == false) {

    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    header('Content-Type: application/json');
    print_r(json_encode([
        'type' => 'error',
        'message' => 'endpoint not found!'
    ]));

} else {
    list($controller, $action ) = explode('@', $match['target']);
    $controller = 'App\\Controllers\\'.$controller;
    $obj = new $controller;
    if (is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), array($match['params']));
    } else {
        
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        header('Content-Type: application/json');
        
        print_r(json_encode([
            'type' => 'error',
            'message' => 'Deu ruim!'
        ]));
    }
}