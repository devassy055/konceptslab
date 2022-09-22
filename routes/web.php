<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookinguserController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\Destinations;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SearchController;
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
   // dd("jdvksdv");
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/Destinations',[App\Http\Controllers\Destinations::class,'index'])->name('Destinationsindex');
Route::resource('user',Destinations::class);
Route::resource('route',RouteController::class);
Route::resource('bus',BusController::class);
Route::resource('booking',BookingController::class);
Route::resource('search',SearchController::class);
//Route::post('book_fliter',BookingController::class,'search')->name('book_fliter');

Route::get('hello', function () {
     dd("jdvksdv");
     return view('auth.login');
 });
//Route::get('search',[App\Http\Controllers\SearchController::class,'destinationFilter'])->name("destinationFilter");

//Route::resource('bookinguser',BookinguserController::class);