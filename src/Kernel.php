<?php

namespace App;

use App\Database\Database;
use App\Database\DatabaseConfig;
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager;

final class Kernel
{
    private Database $database;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->database = new Database(new Manager());
        $this->database
            ->withConfig((new DatabaseConfig())
                ->setDatabaseName(getenv('DB_NAME'))
                ->setUsername(getenv('DB_USER'))
                ->setPassword(getenv('DB_PASS')))
            ->connect();
    }
}
