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

//Register
Route::controller(App\Http\Controllers\RegisterController::class)->group(function () {
    Route::get('/register', 'index');
    Route::post('/register', 'store')->name('register');
});

//Login
Route::controller(App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

//Guest Penunmpang
Route::controller(App\Http\Controllers\PenumpangController::class)->group(function () {
    Route::get('/penumpangs', 'index');
    Route::get('/penumpang/{penumpang}/detail', 'show');
});

//Guest Ticket
Route::controller(App\Http\Controllers\TicketController::class)->group(function () {
    Route::get('/tickets', 'index');
    Route::get('/ticket/{ticket}/detail', 'show');
});

//Dashboard
Route::group(["prefix" => "/dashboard"], function(){
    //Dashboard Ticket
    Route::controller(App\Http\Controllers\DashboardTicketController::class)->group(function () {
        Route::get('/tickets', 'index')->middleware('auth');
        Route::get('/tickets/{ticket}/detail', 'show')->middleware('auth');
        Route::get('/tickets/create', 'create')->middleware('auth');
        Route::post('/tickets', 'store');
        Route::get('/tickets/{ticket}/edit', 'edit')->middleware('auth');
        Route::put('/tickets/{ticket}', 'update');
        Route::delete('/tickets/{ticket}', 'destroy')->middleware('auth');
    });

    //Dashboard Penumpang
    Route::controller(App\Http\Controllers\DashboardPenumpangController::class)->group(function () {
        Route::get('/penumpang', 'index')->middleware('auth');
        Route::get('/penumpang/{penumpang}/detail', 'show')->middleware('auth');
        Route::get('/penumpang/create', 'create')->middleware('auth');
        Route::post('/penumpang', 'store');
        Route::get('/penumpang/{penumpang}/edit', 'edit')->middleware('auth');
        Route::put('/penumpang/{penumpang}', 'update');
        Route::delete('/penumpang/{penumpang}', 'destroy')->middleware('auth');
    });
});