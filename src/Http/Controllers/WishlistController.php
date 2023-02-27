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
        // get categories for navigation
        $categories = Category::all();

        // get category from url
        $categorySlug = $req->getAttribute('category');

        if(!$categorySlug) {
            // get all games from database
            $games = Game::all();
        } else {
            // get games from category
            $category = Category::where('slug', $categorySlug)->first();
            $games = $category->games;
        }

        $view = View::render('wishlist', 
            compact('games', 'categories', 'categorySlug')
        );
        $res->getBody()->write($view);
        return $res;
    }

    // store
    public static function store(Request $req, Response $res, $args)
    {
        // get data from form
        $data = $req->getParsedBody();

        // create new game
        $game = new Game();
        $game->title = $data['title'];
        $game->price = $data['price'];
        $game->description = $data['description'];
        $game->category_id = 1;
        $game->save();

        // redirect to wishlist
        header('Location: /');
        exit;
    }
}
