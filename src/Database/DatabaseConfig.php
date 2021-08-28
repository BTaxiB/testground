<?php

namespace App\Database;

final class DatabaseConfig
{
    const DATABASE_TYPE = 'mysql';
    const DATABASE_HOST = 'localhost';
    private string $databaseName;
    private string $username;
    private string $password;

    public function setDatabaseName(string $databaseName): void
    {
        $this->databaseName = $databaseName;
    }

    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
