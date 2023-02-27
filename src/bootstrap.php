<?php

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;


// include autoload file, only once
$loader = require_once BASEPATH . 'vendor/autoload.php';

// i like nice errors and i cannot lie
$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

// instantiate eloquent database orm
$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'game_wishlist',
    'username' => 'root',
    'password' => 'secret',
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
