<?php

use Slim\Factory\AppFactory;

// include autoload file, only once
$loader = require_once BASEPATH . 'vendor/autoload.php';

// i like nice errors and i cannot lie
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// instantiate the app
$app = AppFactory::create();

// add routes
require_once SRCPATH . 'Routes/web.php';

// run the app
$app->run();