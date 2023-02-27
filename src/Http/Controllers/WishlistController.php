<?php

namespace Src\Http\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Src\Http\Models\Category;
use Src\Http\Models\Game;
use Src\Providers\View;

class WishlistController
{
    public static function index(Request $req, Response $res, $args)
    {

        // get category from url
        $categorySlug = $req->getAttribute('category');

        if(!$categorySlug) {
            // get all games from database
            $games = Game::all();
        } else {
            $category = Category::where('slug', $categorySlug)->first();
            $games = $category->games;
        }


        $categories = Category::all();

        $view = View::render('wishlist', 
            compact('games', 'categories')
        );
        $res->getBody()->write($view);
        return $res;
    }

    // detail

    // create

    // store
}
