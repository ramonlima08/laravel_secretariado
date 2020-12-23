<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
})->name('login');

//Auth::routes(['register'=>false]);

Route::group([
    'middleware' => [],
    'prefix' => 'admin'
], function(){
    Route::get('/dashboard', 'Controller@dashboard')->name('admin.dashboard');
    Route::resource('/contato', 'Admin\ContactController');
    Route::resource('/empresa', 'Admin\CompanyController');
    Route::resource('/agenda', 'Admin\ScheduleController');
    
    //aqui é um caso de redirecionamento para o dashboard
    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    })->name('admin.home');
    Route::get('/home', function(){
        return redirect()->route('admin.dashboard');
    })->name('admin.home2');
});
