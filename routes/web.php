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

Route::get('/', 'ContactController@index')->name('contacts.index');

Auth::routes();

// redirect
Route::get('/register', function () {
    return redirect()->route('contacts.index');
});

Route::get('/password/reset', function () {
    return redirect()->route('contacts.index');
});

// contatos
Route::get('/contatos/cadastrar', 'ContactController@create')->name('contact.create');
Route::post('/contatos/cadastrar', 'ContactController@store')->name('contact.store');
Route::get('/contatos/{id}/show', 'ContactController@show')->name('contact.show');
Route::get('/contatos/{id}/editar', 'ContactController@edit')->name('contact.edit');
Route::put('/contatos/{id}/editar', 'ContactController@update')->name('contact.update');
Route::delete('/contatos/{id}/deletar', 'ContactController@destroy')->name('contact.destroy');
// home
Route::get('/home', 'HomeController@index')->name('home');

