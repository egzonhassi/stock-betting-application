<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    protected $table = 'bets';

    protected $fillable = ['stock_prices_id' , 'user_id' , 'bet_price' , 'bet_type' , 'status'];

    public function stock(){
        return $this->belongsTo('App\StockPrice' , 'stock_prices_id');
    }

    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
