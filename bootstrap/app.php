<?php
// load http layer
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$response = new \Symfony\Component\HttpFoundation\JsonResponse;

//load error handler
new \Core\Error();

// load env variables
$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// load routes
new \Core\Router($request, $response);

// load EloquentORM
if (getenv('DB_STATUS')) {
    new \Core\Eloquent();
}
