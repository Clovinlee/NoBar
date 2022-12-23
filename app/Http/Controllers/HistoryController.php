<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use App\Models\Dtranssnack;
use Illuminate\Http\Request;
use App\Models\history;
use App\Models\Htrans;
use App\Models\Htranssnack;
use App\Models\Movie;
use Generator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HistoryController extends Controller
{
    //
    
    public function history()
    {
        $username = Auth::user()->id;
        $movie = Movie::all();
        $seat = Htrans::find(1); 
        $itemBuy = Htrans::where('user_id',$username)->orderBy('created_at','desc')->get();
        // dd($itemBuy);
        return view('history',
        compact('itemBuy'),compact('seat'),compact('movie'));
    }
    public function historyQR()
    {
        // $qrcode = new Generator;
        // $qr = QrCode::generate('Make me into a QrCode!');

        // return view('historyQR',compact('qr'));

        return view("historyQR");
    }
    public function historyFilter(Request $request)
    {
        $username = Auth::user()->id;
        $itemBuy = Htrans::whereDate('created_at',$request);
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
