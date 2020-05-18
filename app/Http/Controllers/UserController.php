<?php

namespace App\Http\Controllers;
use App\User;
use App\Stock;
use App\Bets;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function chart(){
        return view('chart');
    }

    public function placeBet(Request $r){

        if($r['ammount'] >= Auth::user()->tokens){
            $Stock = StockPrice::find($r->StockId);

            $User = Auth::user();

            $user->tokens = $user->tokens - $r['ammount'];

            $Bet = new Bet();
            $Bet->stock_prices_id = $Stock->id;
            $Bet->user_id = Auth::user()->id;
            $Bet->ammount = $r['ammount'];
            $Bet->bet_type = $r['bet_type'];
    
            if($Bet->save() && $user->save()){
                return redirect()->back()->with('success' ,'Bet has been placed');
            }


        }
        return redirect()->back()->with('error','You do not have enough tokens to place this bet');

      


    }
}
