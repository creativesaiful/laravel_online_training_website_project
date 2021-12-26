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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'HomeController@HomeIndex');

Route::post('/sendmessage', 'HomeController@contactMassageSend');


//Menu link routing

Route::get('/course', 'courseController@coursePage');
Route::get('/project', 'projectController@projectPage');
Route::get('/terms', 'termsController@termsPage');
Route::get('/privacy', 'privacyController@privacyPage');
