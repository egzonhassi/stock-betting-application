<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;
use App\StockPrice;
use Carbon\Carbon;
use App\Bets;
use App\User;

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

        $companies = Company::all();

        foreach ($companies as $company) {
            $oldStockPrice = StockPrice::where('company_id' , '=' , $company->id)->where('new' , '=' ,'1')->get();
            $newStock = $oldStockPrice->replicate();
            $oldStockPrice->new = 0;
            $oldStockPrice->save();
            if($company->isFixed != 1){
                $newStock->price =  $this->getStockPrice($company->symbol);
            }else{
                $company->isFixed = 0;
                $company->save();
            }

            $newStock->save();

        }

        $this->finishBets();


    }

    protected function finishBets(){

        $activeBets = Bets::select("*")->whereDate('created_at' , Carbon::yesterday())->get();

        if(count($activeBets)){
            $companies = Company::all();

            $companyBetWinningArray = array();

            foreach ($companies as $company) {
                $yesterdaysPrice = StockPrice::where('company_id' , '=' , $company->id)->whereDate('created_at' , Carbon::yesterday())->pluck('price');

                $todaysPrice = StockPrice::where('company_id' , '=' , $company->id)->whereDate('created_at' , Carbon::today())->pluck('price');

                if($yesterdaysPrice < $todaysPrice){
                    $winningType = "up";
                }else{
                    $winningType = "down";
                }

               $companyBetWinningArray[$company->id] = $winningType;
            }


            foreach($activeBets as $bet){
                if($companyBetWinningArray[$bet->stock->company_id] == $bet->bet_type){
                    $user = User::find($bet->user_id);
                    $user->tokens = $user->tokens + (2 * $bet->bet_price);
                    $bet->status = "Won";
                    $bet->save();
                    $user->save();
                }else{
                    $bet->status = "Lost";
                    $bet->save();
                }
            }
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
