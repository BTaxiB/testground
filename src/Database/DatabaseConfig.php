<?php

namespace App\Database;

final class DatabaseConfig
{
    const DATABASE_TYPE = 'mysql';
    const DATABASE_HOST = 'localhost';
    private string $databaseName;
    private string $username;
    private string $password;

    public function setDatabaseName(string $databaseName): DatabaseConfig
    {
        $this->databaseName = $databaseName;
        return $this;
    }

    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    public function setUsername(string $username): DatabaseConfig
    {
        $this->username = $username;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password): DatabaseConfig
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
