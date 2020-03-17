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
//     return view('welcome');
// });

// Route::get('/', 'InstagramController@tagSearch');
// Route::get('/', function() {
//     return response()->json([
//      'stuff' => phpinfo()
//     ]);
//  });

Route::get('/', 'InstagramController@search');

Route::post('/add', 'InstagramController@add');
Route::get('/favorites', 'InstagramController@favorite');
Route::post('/delete', 'InstagramController@delete');