<?php

namespace Src\Http\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Providers\View;

class NewsController {
    public static function index(Request $req, Response $res, $args) {
        $randomNews = [
            [
                'title' => 'Titanic is gezonken',
                'content' => 'Jammer, maar helaas',
            ],
            [
                'title' => 'Lego brengt een ode aan de Titanic uit, coole bouwdoos',
                'content' => 'Maar liefst 2.200 stukjes',
            ],
            [
                'title' => 'Leonardo Dicaprio zag Kate Winslet na 14 jaar weer',
                'content' => 'En toen gebeurde wat niemand had verwacht...',
            ]
        ];

        $view = View::render('news', [
            'news' => $randomNews,
        ]);
        $res->getBody()->write($view);
        return $res;
    }
}