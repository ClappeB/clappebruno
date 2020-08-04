<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\App;
use \App\Http\Helpers\RoutesHelper;

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

if(config('app.debug')) {
    Route::namespace('Test')->group(function () {
        Route::any('/test', 'TestController@test')->name('test');
    });
}

$previousLocale = App::getLocale();

foreach (config('app.supported_locales') as $locale) {
    App::setLocale($locale);
    Route::namespace('General')->group(function () use ($locale) {
        Route::get('/', 'GeneralController@welcome')->name('welcome');
        Route::put(__('routes.language') . '/{locale}', 'GeneralController@language')->where('locale', '^[a-zA-Z]{2}$')->name(RoutesHelper::addLocaleToRoute('language', $locale));
        Route::get(__('routes.work'), 'GeneralController@work')->name(RoutesHelper::addLocaleToRoute('work', $locale));
        Route::get(__('routes.contact'), 'GeneralController@contact')->name('contact');
        Route::get(__('routes.legals'), 'GeneralController@legals')->name(RoutesHelper::addLocaleToRoute('legals', $locale));

        Route::get(__('routes.resume'), 'GeneralController@resume')->name(RoutesHelper::addLocaleToRoute('resume', $locale));
        Route::prefix(__('routes.resume'))->group(function () {
            Route::get(__('routes.resume_download'), 'GeneralController@resumeDownload')->name('resume_download');
        });

    });
}

App::setLocale($previousLocale);

Route::fallback(function(){
    return redirect(\route('welcome'));
});

//Auth::routes();
