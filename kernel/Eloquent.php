<?php

namespace Kernel;

// usa o capsule manager do Eloquent ORM para iniciar nossa conexão com o DB
use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent
{

    public function __construct()
    {
        // cria uma capsula de configs
        $capsule = new Capsule;

        if (DB_STATUS) {
            // adiciona a configuração
            $capsule->addConnection([
                'driver' => DB_DRIVER,
                'host' => DB_HOST,
                'database' => DB_NAME,
                'username' => DB_USER,
                'password' => DB_PASS,
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => ''
            ]);

            // da o start no ORM
            $capsule->bootEloquent();
        }
    }
}