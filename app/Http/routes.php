<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


$api = app('Dingo\Api\Routing\Router');

// Version 1 of subject scheduler API

$api->version('v1', function ($api) {

    //Set our namespace for the underlying routes
//    $api->group(['namespace' => 'App\HTTP\Controllers', 'middleware' => '\Barryvdh\Cors\HandleCors::class'],
    $api->group(['namespace' => 'App\HTTP\Controllers'], function ($api) {

//            $api->post('login', 'Auth\AuthController@login');
//            $api->get('wff_user', 'Auth\Controller@getAuthenticatedUser');
//        $api->group(['middleware' => 'jwt.entrust.role:root'], function ($api) {
//            $api->get('user', 'Auth\AuthController@getAuthenticatedUser');
//            $api->get('validate_token', 'Auth\AuthController@validateToken');
//        });
    });
});