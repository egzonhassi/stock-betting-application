<?php

namespace App\Http\Controllers;

use App\Bets;
use Illuminate\Http\Request;
use App\Company;


use Auth;

class BetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(Auth::check()){
            $company = Company::select('companies.id','companies.name' , 'stock_prices.price')
            ->join('stock_prices' , 'companies.id' , '=' , 'stock_prices.company_id')
            ->where('companies.id' , '=' , $id)
            ->where('stock_prices.new' , '=' ,'1')->first();
            return view('placeBets')->with('company' , $company);
        }else{
            return view('auth.login')->withErrors(["Please Login To Proceede"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $r , $id)
    {
        $user = Auth::user();
        if($user){

            if($user->tokens >= $r->amount){
                $bet = new Bets();
                $bet->stock_prices_id = $id;
                $bet->user_id = $user->id;
                $bet->bet_price = $r->amount;
                $bet->bet_type = $r->betType;

                $user->tokens = $user->tokens - $r->amount;

                if($bet->save() && $user->save()){
                    return redirect()->back()->with('success' , 'Bet Placed, Good Luck!');
                }
                return redirect()->back()->withErrors(['Something went wrong, please try again later.']);
            }else{

                return redirect()->back()->withErrors(['Insuffisent Tokens!']);
            }

        }
        return view('auth.login')->withErrors(["Please Login To Proceede"]);
    }

}
