<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Dtranssnack;
use App\Models\Htranssnack;
use App\Models\Midtrans;
use App\Models\Snack;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CafeController extends Controller
{

    public function transactionProcess(Request $r){
        $mdResult = json_decode($r->mdResult);
        $idBranch = $r->idBranch;
        $listItem = json_decode($r->listItem);

        DB::beginTransaction();
        try {
            $t = Transaction::where("transaction_id",$mdResult->transaction_id)->get()->first();
            $t->transaction_status = $mdResult->transaction_status;
            $t->save();
            
            $h = new Htranssnack();
            $h->transaction_id = $t->id;
            $h->user_id = Auth::user()->id;
            $h->branch_id = $idBranch;
            $h->status = $mdResult->transaction_status;

            $h->total = $mdResult->gross_amount;
            // $h->order_id = $mdResult->order_id;
            // $h->transaction_id = $mdResult->transaction_id;
            // $h->payment_type = $mdResult->payment_type;

            $h->save();

            // $listItem
            // id: "7"
            // nama: "French-fries"
            // price: "12000"
            // qty: "2"

            foreach ($listItem as $k => $v) {
                $d = new Dtranssnack();
                $d->htranssnack_id = $h->id;
                $d->snack_id = $v->id;
                $d->harga = $v->price;
                $d->qty = $v->qty;
                $d->save();
            }

            DB::commit();

            return 200;
        } catch (\Throwable $th) {
            
            DB::rollBack();

            return $th;
        }
    }

    public function cafePayment(Request $r){
        if($r->ajax()){
            if(Auth::check() == false){
                Session::flash("error","You need to be logged in first");
                return false;
            }

            $listItem = json_decode($r->listItem);
            $md = Midtrans::getInstance();
            // $md->paymentCafe($r->idBranch, $listItem);
            $mdToken = $md->paymentCafe($r->idBranch, $listItem);
            
            $json = [
                "token"=>$mdToken,
                "idBranch"=>$r->idBranch,
                "listItem"=>$listItem,
            ];

            return json_encode($json);
        }
    }
    
    public function index(){
        //GET SNACK
        $listBranch = Branch::all();
        $listSnacks = Snack::all()->where("tipe","food");
        $listBeverages = Snack::all()->where("tipe","beverage");
        return view("cafe.cafe",["listBranch"=>$listBranch, "listSnacks"=>$listSnacks, "listBeverages"=>$listBeverages]);
    }

    public function refreshCafe(Request $r){
        if($r->ajax()){
            $listItem = json_decode($r->listItem);
            if(count($listItem) <= 0){
                Session::flash("error",$r->msg);
                return false;
            }else{
                return true;
            }
        }
    }
}
