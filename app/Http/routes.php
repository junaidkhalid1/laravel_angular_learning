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

$api = app('Dingo\Api\Routing\Router');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('master');
});

$api->version('v1', function ($api) {

    $api->get('welcome', function () {
        return view('welcome');
    });
    $api->get('hello', 'App\Http\Controllers\HomeController@index');
    $api->get('users/{user_Id}/roles/{role_name}', 'App\Http\Controllers\HomeController@attachUserRole');
    $api->get('users/{user_Id}/roles', 'App\Http\Controllers\HomeController@getUserRole');

    $api->post('role/permission/add', 'App\Http\Controllers\HomeController@attachPermission');
    $api->get('role/{roleParam}/permissions', 'App\Http\Controllers\HomeController@getPermissions');

    $api->post('authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');

    $api->get('users', 'App\Http\Controllers\Auth\AuthController@index');

    $api->get('users/{user_Id}', 'App\Http\Controllers\Auth\AuthController@show');

    $api->get('users/transform', 'UserController@index');

//    $api->post('oauth/access_token', function () {
//        return Authorizer::issueAccessToken();
//    });

});

$api->version('v1', ['middleware' => 'api.auth', 'namespace'=>'App\Http\Controllers'], function ($api) {

//    $api->get('users', 'App\Http\Controllers\Auth\AuthController@index');
//
//    $api->get('user', 'App\Http\Controllers\Auth\AuthController@show');
//
//    $api->get('token', 'App\Http\Controllers\Auth\AuthController@getToken');
//
//    $api->post('delete', 'App\Http\Controllers\Auth\AuthController@destroy');

    // Because of namespace above
    $api->get('user/validate', 'UserController@validateUser');
//    $api->get('users/transform', 'UserController@index');

});
