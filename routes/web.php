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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('documents', 'DocumentController');
Route::group(['middleware' => ['role:super-admin']], function () {

    Route::get('documents/download/{id?}', 'DocumentController@download')->name('documents.download');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
    
});




