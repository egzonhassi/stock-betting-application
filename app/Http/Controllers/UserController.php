<?php

namespace App\Http\Controllers;
use App\User;
use App\Stock;
use App\Bets;
use App\Company;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function dashboard(){
        if(Auth::user()){
            $companies = Company::select('companies.id','companies.name' , 'stock_prices.price')
            ->join('stock_prices' , 'companies.id' , '=' , 'stock_prices.company_id')
            ->where('stock_prices.new' , '=' ,'1')->get();

            $activeBets = Bets::where('bets.user_id' , '=' , Auth::user()->id)->whereDate('created_at' , Carbon::today())->count();

            $numberOfbets = Bets::where('bets.user_id' , '=' , Auth::user()->id)->count();


            return view('dashboard')->with([
                'companies' => $companies,
                'activeBets' => $activeBets,
                'numberOfBets' => $numberOfbets
                ]);
        }else{
            return redirect('/');
        }

    }

    public function bettingHistory(){

        if(Auth::user()){

            $bets = Bets::select("companies.name" , "bets.created_at" , "bets.bet_price" , "bets.bet_type")
            ->join('stock_prices' , 'stock_prices.id' , '=' ,'bets.stock_prices_id')
            ->join('companies' , 'companies.id' , '=' ,'company_id')
            ->where('bets.user_id' , '=' , Auth::user()->id)
            ->get();

            $activeBets = Bets::where('bets.user_id' , '=' , Auth::user()->id)->whereDate('created_at' , Carbon::today())->count();

            $numberOfbets = Bets::where('bets.user_id' , '=' , Auth::user()->id)->count();


            return view('bettingHistory')->with([
                'bets' => $bets,
                'activeBets' => $activeBets,
                'numberOfBets' => $numberOfbets
                ]);
        }else{
            return redirect('/');
        }
    }

    public function stockPriceChart(){
        return view('stockPriceChart');
    }

    public function fixPrices(){
        if(Auth::user()->isAdmin == 1){
            $companies = Company::select('companies.id','companies.name' , 'stock_prices.price' , 'companies.symbol' , 'companies.isFixed')
            ->join('stock_prices' , 'companies.id' , '=' , 'stock_prices.company_id')
            ->where('stock_prices.new' , '=' ,'1')->get();
            return view('admin.fixPrices')->with('companies' , $companies);
        }else{
            return redirect('/');
        }
    }

    public function fixPrice($id){
        if(Auth::user()->isAdmin == 1){
            $company = Company::find($id);
            if($company->isFixed == 1){
                $company->isFixed = 0;
            }else{
                $company->isFixed = 1;
            }
                $company->save();

            return redirect()->back()->with('success' , 'Company Got Fixed');
        }else{
            return view('404');
        }
    }
}
