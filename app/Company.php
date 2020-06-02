<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name','symbol' , 'isFixed' , 'fixedPrice'];

    public function stocs()
    {
        return $this->hasMany('App\StockPrice');
    }
}
