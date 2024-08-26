<?php

use App\Controllers\HomeControllers;
use App\Controllers\MovieController;
use App\Router\Route;

return [
    Route::get('/', [HomeControllers::class, 'index']),
    Route::get('/home', [HomeControllers::class, 'index']),
    Route::get('/movies', [MovieController::class, 'index']),
];
