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
    if(Auth::check()){
        return redirect('dashboard');
    }
    return view('auth/login');
})->name('login');

Auth::routes();

Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

Route::get('chart', 'UserController@chart')->name('chart');

Route::get('placeBets/{id}' , 'BetsController@index')->name('placeBets');

Route::post('makeBet/{id}' , 'BetsController@create')->name('makeBet');

Route::get('fixPrices' , 'UserController@fixPrices')->name('fixPrices');

Route::get('fixPrice/{id}' , 'UserController@fixPrice')->name('fixPrice');

Route::get("test", function(){
    $companies = App\Company::select('companies.name' , 'stock_prices.price' , 'companies.symbol')
            ->join('stock_prices' , 'companies.id' , '=' , 'stock_prices.company_id')
            ->where('stock_prices.new' , '=' ,'1')->get();

    return response()->json($companies, 200);
});
