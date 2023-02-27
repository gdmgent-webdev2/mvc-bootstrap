<?php

namespace Src\Http\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Http\Models\Game;
use Src\Providers\View;

class WishlistController
{
    public static function index(Request $req, Response $res, $args)
    {
        // get all games from database
        $games = Game::all();

        $view = View::render('wishlist', compact('games'));
        $res->getBody()->write($view);
        return $res;
    }

    // detail

    // create

    // store
}
