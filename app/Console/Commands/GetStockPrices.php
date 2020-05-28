<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetStockPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:GetStockPrices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Stock Prices from https://www.worldtradingdata.com/ with API KEY A0Vv00PA7moH0pqrZYdrBxCfW8wv44ph5x9YdFBC74OZxFf2gu4Ndij0qYW1';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $token = 'pk_79ada5d3f2054fea97bd2b57d055d5e2';
        $company = [
            "Apple" => "aapl",
            "Starbucks" => "sbux",
            "Nike" => "NKE",
            "Sony" => "SNE",
            "Google" => "GOOG"
        ];

        foreach ($company as $key => $value) {
            $token = 'pk_79ada5d3f2054fea97bd2b57d055d5e2';
            $company = [
                // "Apple" => "aapl",
                "Starbucks" => "sbux",
                "Nike" => "NKE",
                "Sony" => "SNE",
                "Google" => "GOOG"
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://cloud.iexapis.com/stable/stock/'.$value.'/quote?token='.$token);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            return json_decode($result , true);//['companyName'];
            //['iexRealtimePrice']
            //['symbol']
        }
    }
}
