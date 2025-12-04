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

/* Grupo de Rotas Autenticadas */

Route::middleware(['auth'])->group(function () {
    /* Manager Dashboard  */
    Route::get('admin/painel', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);

    Route::middleware(['Administrador'])->group(function () {

        /* User */
        Route::get('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
        Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show'])->withoutMiddleware(['Administrador']);
        Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit'])->withoutMiddleware(['Administrador']);;
        Route::put('admin/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update'])->withoutMiddleware(['Administrador']);;
        Route::get('admin/user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy']);
        /* end user */
    });

    Route::get('admin/registration/index', ['as' => 'admin.registration.index', 'uses' => 'Admin\RegistrationController@index']);
    Route::get('admin/registration/show/{id}', ['as' => 'admin.registration.show', 'uses' => 'Admin\RegistrationController@show']);

    Route::get('export-registrations', ['as' => 'registrations.export', 'uses' => 'Admin\RegistrationExportController@export']);

    Route::middleware(['USP'])->group(function () {

        Route::get('admin/registration/edit/{id}', ['as' => 'admin.registration.edit', 'uses' => 'Admin\RegistrationController@edit']);
        Route::put('admin/registration/update/{id}', ['as' => 'admin.registration.update', 'uses' => 'Admin\RegistrationController@update']);
        Route::get('admin/registration/print/{code}', ['as' => 'admin.registration.print', 'uses' => 'Admin\RegistrationController@print']);

        /* operational-team */
        Route::get('admin/operational-team/create', ['as' => 'admin.team.create', 'uses' => 'Admin\TeamController@create']);
        Route::post('admin/operational-team/store', ['as' => 'admin.team.store', 'uses' => 'Admin\TeamController@store']);
        Route::get('admin/operational-team/index', ['as' => 'admin.team.index', 'uses' => 'Admin\TeamController@index']);
        Route::get('admin/operational-team/show/{id}', ['as' => 'admin.team.show', 'uses' => 'Admin\TeamController@show']);
        Route::get('admin/operational-team/edit/{id}', ['as' => 'admin.team.edit', 'uses' => 'Admin\TeamController@edit']);
        Route::put('admin/operational-team/update/{id}', ['as' => 'admin.team.update', 'uses' => 'Admin\TeamController@update']);
        Route::get('admin/operational-team/print/{code}', ['as' => 'admin.team.print', 'uses' => 'Admin\TeamController@print']);
        /* end operational-team */
    });
});
