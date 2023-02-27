<?php

use Src\Http\Controllers\WishlistController;

// add routes
$app->get('/', WishlistController::class . ':index');