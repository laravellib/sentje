<?php

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

    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('lang/{locale}', 'LocalController@setLocale');
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::put('/settings', 'SettingsController@update')->name('settings.update');
    Route::resource('/contacts', 'ContactController');
    Route::get('/account/exportAccount', 'BankAccountController@exportAccount')->name('account.exportAccount');
    Route::resource('/account', 'BankAccountController');
    Route::resource('/groups', 'GroupController');
