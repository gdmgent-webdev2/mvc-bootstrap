<?php

use Src\Http\Controllers\WishlistController;

// add routes
$app->get('/[{category}]', WishlistController::class . ':index');
$app->post('/store', WishlistController::class . ':store');