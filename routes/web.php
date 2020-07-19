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
Route::namespace('General')->group(function(){
    Route::get('/', 'GeneralController@welcome')->name('welcome');
    Route::get(__('routes.work'), 'GeneralController@work')->name('work');
    Route::get(__('routes.contact'), 'GeneralController@contact')->name('contact');
    Route::get(__('routes.legals'), 'GeneralController@legals')->name('legals');

    Route::prefix(__('routes.resume'))->group(function(){
        Route::get('/', 'GeneralController@resume')->name('resume');
        Route::get(__('routes.resume_download'), 'GeneralController@ResumeDownload')->name('resume_download');
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
