<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager;

final class Database
{
    private Manager $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param DatabaseConfig $config
     * @return Database
     */
    public function withConfig(DatabaseConfig $config): Database
    {
        $this->manager->addConnection([
            'driver'   => DatabaseConfig::DATABASE_TYPE,
            'host'     => DatabaseConfig::DATABASE_HOST,
            'database' => $config->getDatabaseName(),
            'username' => $config->getUsername(),
            'password' => $config->getPassword(),
            'prefix'   => '',
        ]);

        return $this;
    }

    /**
     * @return void
     */
    public function connect(): void
    {
        $this->manager->bootEloquent();
    }
}
