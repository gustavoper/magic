<?php

//load error handler
new \Core\Error();

// load env variables
$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// load routes
new \Core\Router();

// load EloquentORM
if (getenv('DB_STATUS')) {
    new \Core\Eloquent();
}
