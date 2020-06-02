<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


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
    if(Auth::check()){
        return redirect('dashboard');
    }
    return view('auth/login');
})->name('login');

Auth::routes();

Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

Route::get('stockPriceChart', 'StockPriceController@stockPriceChart')->name('stockPriceChart');

Route::get('placeBets/{id}' , 'BetsController@index')->name('placeBets');

Route::post('makeBet/{id}' , 'BetsController@create')->name('makeBet');

Route::get('fixPrices' , 'UserController@fixPrices')->name('fixPrices');

Route::get('fixPrice/{id}' , 'UserController@fixPrice')->name('fixPrice');

Route::post('fix/{id}' , 'UserController@fix')->name('fix');

Route::get('profile' , 'UserController@profile')->name('profile');

Route::post('profile' , "UserController@updateProfile")->name('profile');

Route::get('unfix/{id}' , 'UserController@unfix')->name('unfix');

Route::get('bettingHistory', 'UserController@bettingHistory')->name('bettingHistory');
