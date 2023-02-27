<?php

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv as Dotenv;

// include autoload file, only once
$loader = require_once BASEPATH . 'vendor/autoload.php';

// load environment variables
$dotenv = Dotenv::createImmutable(BASEPATH);
$dotenv->load();


// i like nice errors and i cannot lie
$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

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
