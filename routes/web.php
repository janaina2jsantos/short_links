<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home.index');

Auth::routes();

// redirect
Route::get('/register', function () {
    return redirect()->route('home.index');
});

Route::get('/password/reset', function () {
    return redirect()->route('home.index');
});

Route::get('/home', function () {
    return redirect()->route('home.index');
});

Route::middleware('auth')->group(function() {
    Route::group(['middleware' => 'is.admin'], function() {
        // clientes
        Route::get('/clientes', 'ClienteController@index')->name('clientes.index');
        Route::post('/clientes/cadastrar', 'ClienteController@store')->name('clientes.store');
        Route::get('/clientes/editar/{id}', 'ClienteController@edit')->name('clientes.edit');
        Route::put('/clientes/editar/{id}', 'ClienteController@update')->name('clientes.update');
        Route::delete('/clientes/deletar/{id}', 'ClienteController@destroy')->name('clientes.destroy');
    });
    // links
    Route::get('/links', 'LinkController@index')->name('links.index');
    Route::post('/links/cadastrar', 'LinkController@store')->name('links.store');
    Route::get('/links/editar/{id}', 'LinkController@edit')->name('links.edit');
    Route::put('/links/editar/{id}', 'LinkController@update')->name('links.update');
    Route::delete('/links/deletar/{id}', 'LinkController@destroy')->name('links.destroy');
    Route::put('/links/counter/{id}', 'LinkController@counter')->name('links.counter');

});

