<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;


Route::prefix('api')->middleware('api')->group(function () {
    Route::get('laravelaliscan/index', 'ApiPubController@index');
});

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'middleware'    => config('admin.route.middleware')
], function (Router $router) {
    $router->resource('laravelaliscan', 'BackendController');
});

