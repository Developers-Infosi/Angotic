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



//registration
Route::get('/', ['as' => 'site.home', 'uses' => 'Site\RegistrationController@create']);
Route::post('registration/store', ['as' => 'site.registration.store', 'uses' => 'Site\RegistrationController@store']);
Route::get('/registration/receipt/{code}', ['as' => 'site.registration.receipt', 'uses' => 'Site\RegistrationController@receipt']);

//Route::get('registration/verify/{code}', ['as' => 'site.registration.verify', 'uses' => 'Admin\RegistrationController@verify']);



/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';



