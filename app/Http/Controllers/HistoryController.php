<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use Illuminate\Http\Request;
use App\Models\history;
use App\Models\Htrans;
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
        // dd($username);
        $seat = Htrans::find(1)->dtrans; 
        // dd($seat);   
        $itemBuy = Htrans::all()->where('user_id',$username);
        return view('history',compact('itemBuy'),compact('seat'));
        // return view(Htrans::find(10)->schedule->movie);
        // $itemBuy = DB::table('htrans')
        // ->join("htrans","dtrans.id_htrans","=","htrans.id")
        // ->join("barang","barang.kode","=","dtrans.id_barang")
        // ->select("htrans.id","barang.kode","barang.harga","d_trans.jumlah","h_trans.created_at","barang.foto")
        // ->where("htrans.id_buyer",$username)
        // ->get();
        // return View::make("historypage",[
        //     "itemBuy"=>$itemBuy
        // ]);
    }
}
