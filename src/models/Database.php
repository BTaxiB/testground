<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager;

class Database
{
    function __construct()
    {
        $capsule = new Manager;
        $capsule->addConnection([
            'driver'   => DBTYPE,
            'host'     => DBHOST,
            'database' => DBNAME,
            'username' => DBUSER,
            'password' => DBPASS,
            'prefix'   => '',
        ]);

        $capsule->bootEloquent();
    }

    static function connect(): Database
    {
        return new self;
    }
}
