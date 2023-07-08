<?php

require 'vendor/autoload.php';

ini_set("display_errors", 1);
ini_set('log_errors', 1);
ini_set("error_reporting", E_ALL);
date_default_timezone_set('Europe/London');

use App\Kernel;

$kernel = new Kernel();

echo 'eeee';
//$kernel->run();
