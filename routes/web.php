<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'FormController@index');
// Route::auth();
Route::post('index', 'FormController@store')->name('store');
Route::post('index2', 'FormController@store2')->name('store2');

Route::get('test', 'PdfController@test');

Route::get('approve_1/{id}', 'FormController@approve_1')->name('approve_1');
Route::get('approve_2/{id}', 'FormController@approve_2')->name('approve_2');
Route::get('approve_3/{id}', 'FormController@approve_3')->name('approve_3');

Route::post('/disapprove/{id}',  'FormController@disapproveReq')->name('disapproveReq');

Route::get('/index2', 'FormController@index2')->name('index2');
Route::get('/requisitions/{id}', 'FormController@requisitions')->name('requisitions');
Route::get('/requests/{id}', 'FormController@requests')->name('requests');


Route::get('/disapprovalReason/{id}',  'FormController@disapprovalReason')->name('disapprovalReason');


Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {


    Route::post('/', 'FormController@index')->name('index');
   // Route::get('/index2', 'FormController@index2')->name('index2');
    //Route::get('/requisitions/{id}', 'FormController@requisitions')->name('requisitions');

    Route::get('/approve/{id}',  'FormController@approveReq')->name('approveReq');

    Route::get('/sendEmail',  'FormController@sendEmail')->name('sendEmail');
});
