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
//     return view('menu.dynamicMenu');
// });

// Route::get('menus','MenuController@Add')->name('menu');
// Route::get('','MenuController@Index')->name('index');
// Route::post('create','MenuController@Create')->name('create');

   
    Route::get('', 'MenuController@Index')->name('index');
    Route::get('create', 'MenuController@Create')->name('create');
    Route::post('createsave', 'MenuController@CreateSave')->name('createsave');