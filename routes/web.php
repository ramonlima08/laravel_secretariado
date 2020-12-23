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
    return view('welcome');
});
//Auth::routes(['register'=>false]);

Route::group([
    'middleware' => [],
    'prefix' => 'admin'
], function(){
    Route::get('/dashboard', 'Controller@dashboard')->name('admin.dashboard');
    Route::resource('/contato', 'Contact');
    Route::resource('/empresa', 'Company');
    
    //aqui é um caso de redirecionamento para o dashboard
    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    })->name('admin.home');
});
