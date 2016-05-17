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

Route::get('/', function ()
{
    return view('about');
});

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function ()
{
    Route::get('/', 'PagesController@home');
    Route::get('users', ['as' => 'admin.user.index', 'uses' => 'UsersController@index']);
    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    Route::get('posts', 'PostsController@index');
    Route::get('posts/create', 'PostsController@create');
    Route::post('posts/create', 'PostsController@store');
    Route::get('posts/{id?}/edit', 'PostsController@edit');
    Route::post('posts/{id?}/edit', 'PostsController@update');

    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/create', 'CategoriesController@create');
    Route::post('categories/create', 'CategoriesController@store');

});


Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');


Route::get('users/{id?}/edit', 'Admin\UsersController@edit');
Route::post('users/{id?}/edit', 'Admin\UsersController@update');

Route::get('/about', 'TicketsController@index');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');
Route::get('/home', 'PagesController@home');

Route::get('/tickets', 'TicketsController@index');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');
Route::post('/ticket/{slug?}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');

Route::post('/comment', 'CommentsController@newComment');


Route::get('sendemail', function ()
{
    $data = array('name' => "Learning Laravel",);
    Mail::send('emails.welcome', $data, function ($message)
    {
        $message->from('test@domain.com', 'Learning Laravel');
        $message->to('poklin8@gmail.com')->subject('Learning Laravel test email');
    });

    return "Your email has been sent successfully";
});

Route::get('users/register', 'Auth\AuthController@getRegister');
Route::post('users/register', 'Auth\AuthController@postRegister');
Route::get('users/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');
Route::get('users/logout', 'Auth\AuthController@getLogout');

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

