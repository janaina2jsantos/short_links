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

Route::get('/contatos/cadastrar', 'ContactController@create')->name('contacts.create');
Route::post('/contatos/cadastrar', 'ContactController@store')->name('contacts.store');
Route::get('/contatos/{id}/editar', 'ContactController@edit')->name('contact.edit');
Route::put('/contatos/{id}/editar', 'ContactController@update')->name('contact.update');

Route::get('/home', 'HomeController@index')->name('home');

