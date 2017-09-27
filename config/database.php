<?php

namespace App\Database;

// usa o capsule manager do Eloquent ORM para iniciar nossa conexão com o DB
use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent
{
    public function __construct()
    {
        // cria uma capsula de configs
        $capsule = new Capsule;

        if (getenv('DB_STATUS')) {
            // adiciona a configuração
            $capsule->addConnection([
                'driver' => getenv('DB_DRIVER'),
                'host' => getenv('DB_HOST'),
                'database' => getenv('DB_NAME'),
                'username' => getenv('DB_USER'),
                'password' => getenv('DB_PASS'),
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => ''
            ]);

            // da o start no ORM
            $capsule->bootEloquent();
        }
    }
}
