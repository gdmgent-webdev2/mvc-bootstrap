<?php

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv as Dotenv;

// include autoload file, only once
$loader = require_once BASEPATH . 'vendor/autoload.php';

// load environment variables
$dotenv = Dotenv::createImmutable(BASEPATH);
$dotenv->load();

// if local, show errors
if($_ENV['APP_ENV'] === 'local') {
    // show errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // show pretty errors
    $whoops = new \Whoops\Run();
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();
} else {
    // hide errors
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// instantiate eloquent database orm
$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => $_ENV['DATABASE_NAME'] ?? '',
    'username' => $_ENV['DATABASE_USER'] ?? '',
    'password' => $_ENV['DATABASE_PASSWORD'] ?? '',
    'port' => '3306',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

// instantiate the app
$app = AppFactory::create();

// add routes
require_once SRCPATH . 'Routes/web.php';

// run the app
$app->run();
