<?php

namespace App;

require 'vendor/autoload.php';

ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set("error_reporting", E_ALL);
date_default_timezone_set('Europe/London');

/**
 * Main App Dependencies
 */
use App\Database\Database;
use App\Database\DatabaseConfig;
use App\Scrapers\TestScraperCommand;
use Illuminate\Database\Capsule\Manager;

$test = new TestScraperCommand;
//$databaseManager = new Manager();
//
//$databaseConfig = new DatabaseConfig();
//$databaseConfig->setDatabaseName('projekat');
//$databaseConfig->setUsername('root');
//$databaseConfig->setPassword('');
//
//$database = new Database($databaseManager);
//$database->withConfig($databaseConfig)->connect();
