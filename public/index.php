<?php

// get the magical autoloader
require dirname(__DIR__) . '/vendor/autoload.php';

//load error handler
new Core\Error();

// load env variables
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// load routes
new Core\Router();

// load EloquentORM
new Core\Eloquent();


