<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix' => 'api', 'namespace' => 'Api'], function () use ($router) {
    $router->get('kategori',  'KategoriController@index');
    $router->post('kategori',  'KategoriController@store');

    $router->get('{uri}', 'MovieController@index');
});