<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use App\Models\Dtranssnack;
use Illuminate\Http\Request;
use App\Models\history;
use App\Models\Htrans;
use App\Models\Htranssnack;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class HistoryController extends Controller
{
    //
    
    public function history()
    {
        $username = Auth::user()->id;
        $movie = Movie::all();
        $seat = Htrans::find(1)->dtrans; 
        $itemBuy = Htrans::all()->where('user_id',$username);
        return view('history',compact('itemBuy'),compact('seat'),compact('movie'));
        
    }
    public function historyCafe()
    {
        $username = Auth::user()->id;
        // dd($username);   
        $snacks = htranssnack::find(1)->dtranssnack;
        // dd($snacks);
        $itemBuy = Htranssnack::all()->where('user_id',$username);
        // dd($itemBuy);
        return view('historyCafe',compact('itemBuy'),compact('snacks'));
        
    }
}
