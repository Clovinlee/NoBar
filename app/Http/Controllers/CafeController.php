<?php

namespace App\Http\Controllers;

use App\Models\Branch;
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
        
        DB::beginTransaction();
        try {
            $t = Transaction::where("transaction_id",$mdResult->transaction_id)->get()->first();
            $t->transaction_status = $mdResult->transaction_status;
            $t->save();
            
            $h = new Htrans();
            $h->transaction_id = $t->id;
            $h->user_id = Auth::user()->id;
            $h->schedule_id = $schedule->id;
            $h->status = $mdResult->transaction_status;

            $h->total = $mdResult->gross_amount;
            // $h->order_id = $mdResult->order_id;
            // $h->transaction_id = $mdResult->transaction_id;
            // $h->payment_type = $mdResult->payment_type;

            $h->save();

            foreach ($seatList as $k => $v) {
                $d = new Dtrans();
                $d->htrans_id = $h->id;
                $d->seat = $v;
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
            // $md->paymentCafe($r->branchId, $listItem);
            $mdToken = $md->paymentCafe($r->branchId, $listItem);
            
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
        $listSnacks = Snack::all();
        return view("cafe.cafe",["listBranch"=>$listBranch, "listSnacks"=>$listSnacks]);
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
