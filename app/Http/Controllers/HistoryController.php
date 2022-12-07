<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class HistoryController extends Controller
{
    //
    
    public function history()
    {
        // $itemBuy = history::all();
        // return view('history',compact('itemBuy'));
        $username = Session::get("username");
        $itemBuy = DB::table('htrans')
        ->join("htrans","dtrans.id_htrans","=","htrans.id")
        ->join("barang","barang.kode","=","dtrans.id_barang")
        ->select("htrans.id","barang.kode","barang.harga","d_trans.jumlah","h_trans.created_at","barang.foto")
        ->where("htrans.id_buyer",$username)
        ->get();
        return View::make("historypage",[
            "itemBuy"=>$itemBuy
        ]);
    }
}
