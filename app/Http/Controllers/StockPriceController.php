<?php

namespace App\Http\Controllers;

use App\Company;
use App\StockPrice;
use Illuminate\Http\Request;

class StockPriceController extends Controller
{
   public function stockPriceChart(){

    $returnArray = array(
        "data" => $this->getCompaniesStockPrice(),
        "startdate" => $this->startDate()
    );

    return view('stockPriceChart')->with('data' , $returnArray);

   }

   public function getCompaniesStockPrice(){
       $companies = Company::all();
        $returnArray = array();
       foreach ($companies as $company) {
        $data = StockPrice::where('company_id' , '=' , $company->id)->pluck('price');


        $dataArray= array(
            "name" => $company->name,
            "data" => $data
        );
        array_push($returnArray , $dataArray);
       }


       return $returnArray;




   }

   public function startDate(){

    $data = StockPrice::select('created_at')->orderBy('created_at','asc')->first();

    $year = date('Y', strtotime($data->created_at));
    $month = date('m', strtotime($data->created_at));
    $day = date('d', strtotime($data->created_at));

    $returnArray = array(
        "year" => $year,
        "month" =>  $month,
        "day" => $day
    );

    return $returnArray;
   }
}
