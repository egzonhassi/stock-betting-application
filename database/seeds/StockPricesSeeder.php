<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\StockPrice;
class StockPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            $newStock = new StockPrice();
            $newStock->price =  $this->getStockPrice($company->symbol);
            $newStock->company_id = $company->id;
            $newStock->save();
        }
    }

    protected function getStockPrice($symbol){
        $token = 'pk_79ada5d3f2054fea97bd2b57d055d5e2';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://cloud.iexapis.com/stable/stock/'.$symbol.'/quote?token='.$token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);



        return json_decode($result , true)['iexRealtimePrice'];
    }
}
