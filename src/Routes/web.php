<?php
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Http\Controllers\NewsController;

// add routes
$app->get('/', function (Request $req, Response $res) {
    $res->getBody()->write('Hello 2NMD');
    return $res;
});

$app->get('/hello/{name}', function (Request $req, Response $res, $args) {
    $name = $args['name'];
    $res->getBody()->write("Hello $name");
    return $res;
});

$app->get('/news', NewsController::class . ':index');