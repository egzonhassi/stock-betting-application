<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockPrice extends Model
{
    protected $table = "stock_prices";

    protected $fillable = ['company_id','price','new'];

    public function companies()
    {
        return $this->belongsTo('App\Company');
    }
}
