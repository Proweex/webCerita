<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CeritaController;

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

Route::get('/', 'PagesController@index');
Route::get('/m/login', 'PagesController@login');
Route::resource('cerita', 'CeritaController')->except(['index','show']);
Route::resource('m/{idCerita}/jilid', 'JilidController')->except(['index','show']);
Route::resource('m/{idCerita}/{nomorJilid}/bab', 'BabController')->except(['index','show']);

Route::resource('m/user-manager', 'UserController');

Route::get('cerita', 'CeritaController@index');
Route::get('c/{idCerita}', 'PagesController@showCerita');

Route::get('c/{idCerita}/{nomorJilid}', [
    'as'=>'listBab', 
    'uses'=>'PagesController@showJilid'
    ]);

Route::get('c/{idCerita}/{nomorJilid}/{nomorBab}', [
    'as'=>'isiBab', 
    'uses'=>'PagesController@showsText'
    ]);