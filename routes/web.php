<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['namespace' => 'V1', 'prefix' => 'categories'], function () use ($router) {
    $router->get('/', 'CategoryController@index');
    $router->get('/{id}', 'CategoryController@detailCategory');
    $router->post('/', 'CategoryController@createCategory');
    $router->put('/{id}', 'CategoryController@updateCategory');
    $router->delete('/{id}', 'CategoryController@deleteCategory');
});

$router->group(['namespace' => 'V1', 'prefix' => 'books'], function () use ($router) {
    $router->get('/', 'BookController@getAllBooks');
    $router->get('/cat/{catid}', 'BookController@getBooksbyCat');
    $router->get('/{id}', 'BookController@getBookById');
    $router->post('/', 'BookController@createBook');
    $router->put('/{id}', 'BookController@updateBook');
    $router->delete('/{id}', 'BookController@deleteBook');
});

$router->group(['namespace' => 'V1', 'prefix' => 'auth'], function () use ($router) {
    $router->post('/login', 'AuthController@login');
    $router->get('/logout', 'AuthController@logout');
});

$router->group(['namespace' => 'V1', 'prefix' => 'user'], function () use ($router) {
    $router->post('/register', 'UserController@register');
    $router->get('/profile', 'UserController@profile');
    $router->get('/addBook/{id}', 'UserController@addbook');    
});

// $router->group(['namespace' => 'V1', 'prefix' => 'user'], function () use ($router) {
//     $router->post('/auth', 'AuthController@auth');
//     $router->post('/register', 'UserController@register');
//     $router->put('/update/{id}', 'UserController@update');
//     $router->delete('/delete/{id}', 'UserController@delete');
// });


