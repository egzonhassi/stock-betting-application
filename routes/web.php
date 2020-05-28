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
        return view('dashboard');
    }
    return view('auth/login');
})->name('login');

Auth::routes();

Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

Route::get('chart', 'UserController@chart')->name('chart');

Route::get('placeBets' , 'BetsController@index')->name('placeBets');

Route::get('stockTest' , function(){

    $token = 'pk_79ada5d3f2054fea97bd2b57d055d5e2';
    $company = [
        "Apple" => "aapl",
        "Starbucks" => "sbux",
        "Nike" => "NKE",
        "Sony" => "SNE",
        "Google" => "GOOG"
    ];

    foreach ($company as $key => $value) {
    }
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://cloud.iexapis.com/stable/stock/GOOG/quote?token='.$token);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    return json_decode($result , true);//['companyName'];
    //['iexRealtimePrice']
    //['symbol']
});

Route::get('companies', function () {
    return response()->json(App\Company::all());
});

