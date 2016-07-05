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
    $api->group(['namespace' => 'App\Http\Controllers'], function ($api) {

//            $api->post('login', 'Auth\AuthController@login');
//            $api->get('wff_user', 'Auth\Controller@getAuthenticatedUser');
//        $api->group(['middleware' => 'jwt.entrust.role:root'], function ($api) {
//            $api->get('user', 'Auth\AuthController@getAuthenticatedUser');
//            $api->get('validate_token', 'Auth\AuthController@validateToken');
//        });

        $api->group(['prefix' => 'rooms'], function ($api) {
            $api->post('/', 'RoomController@store');
            $api->get('/', 'RoomController@index');
            $api->get('/{id}', 'RoomController@show');
            $api->put('/{id}', 'RoomController@store');
            $api->delete('/{id}', 'RoomController@destroy');
        });

        $api->group(['prefix' => 'schedules'], function ($api) {
            $api->post('/', 'ScheduleController@store');
            $api->get('/', 'ScheduleController@index');
            $api->get('/{id}', 'ScheduleController@show');
            $api->put('/{id}', 'ScheduleController@store');
            $api->delete('/{id}', 'ScheduleController@destroy');
        });

        $api->group(['prefix' => 'subjects'], function ($api) {
            $api->post('/', 'SubjectController@store');
            $api->get('/', 'SubjectController@index');
            $api->get('/{id}', 'SubjectController@show');
            $api->put('/{id}', 'SubjectController@store');
            $api->delete('/{id}', 'SubjectController@destroy');
        });

        $api->group(['prefix' => 'users'], function ($api) {
            $api->post('/', 'UserController@store');
            $api->get('/', 'UserController@index');
            $api->get('/{id}', 'UserController@show');
            $api->put('/{id}', 'UserController@store');
            $api->delete('/{id}', 'UserController@destroy');
        });

    });
});