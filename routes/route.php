<?php

/**
 * Web Routes
 *
 * This is where you register your application routes
 * E.g $router->map('METHOD', 'URI', 'Controller@method')
 * Where METHOD can be GET, POST, PUT, PATCH, DELETE
 * URI /user/dashboard, /account/logout etc
 * Controller method is the method defined inside App\Controllers\Controller::class
 */

$router->map('GET', '/[a:name]', 'Controller@hello');
$router->map('GET', '/', 'Controller@hello');
$router->map('POST', '/', 'Controller@postTest');


