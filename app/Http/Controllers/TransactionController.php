<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use App\Models\Htrans;
use App\Models\Midtrans as ModelsMidtrans;
use App\Models\MidtransNotification as ModelsMidtransNotification;
use App\Models\MidtransNotification\MidtransNotification;
use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{

    public function checkBook(Request $r){
        $schedule = Schedule::find($r->scheduleId);
        $qtyTicket = $r->ticketQty;
        $seatList = json_decode($r->seatList);

        // $exist = DB::select('select * from users where active = ?', [1])

        // $htrans = Htrans::where("schedule_id",$schedule->id)->get();
        // foreach ($htrans as $key => $h) {
        //     foreach ($h->dtrans() as $k => $d) {
                
        //     }
        // }

        $duplicate = false;

        foreach ($seatList as $key => $seat) {
            $seatDB = DB::select('SELECT d.id, d.seat FROM htrans h JOIN dtrans d ON d.htrans_id = h.id WHERE h.schedule_id = ? AND d.seat = ? AND h.status != ?;', [$schedule->id, $seat, 'expire']);
            $duplicate = $seatDB != null;
            if($duplicate == true){
                break;
            }
        }

        // True = duplikat, False = Non duplikat
        return $duplicate;
    }

    public function transactionProcess(Request $r){

        $mdResult = json_decode($r->mdResult);
        $schedule = Schedule::find($r->scheduleId);
        $qtyTicket = $r->ticketQty;
        $seatList = json_decode($r->seatList);
        
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

    public function bookPayment(Request $r){
        if($r->ajax()){
            $md = ModelsMidtrans::getInstance();
            // _token:'{{ csrf_token() }}',
            // scheduleId:'{{ $schedule->id }}',
            // ticketQty:'{{ $data["qtyTicket"] }}',
            // ticketPrice:'{{ $schedule->price }})',
            // seatList: JSON.stringify(seatList),

            // scheduleId : "17"
            // seatList : "[\"C8\",\"D8\",\"E8\",\"F8\"]"
            // ticketPrice : "50000)"
            // ticketQty: "4"
            // _token : "2uEo2zgqLWWVkDnmQNstrFnptDRWeHVU2tUklfc6"

            $schedule = Schedule::find($r->scheduleId);
            $qtyTicket = $r->ticketQty;
            $seatList = json_decode($r->seatList);

            $mdToken = $md->payment($schedule, $qtyTicket, $seatList);
            
            $json = [
                "token"=>$mdToken,
                "schedule"=>$schedule,
                "seat"=>$seatList,
            ];

            return json_encode($json);
        }
    }

    public function payment_notification(Request $r){
        $t = Transaction::where("order_id","=",$r->order_id)->get();
        if(count($t) != 0){
            $t = Transaction::where("order_id","=",$r->order_id)->get()->first();

            $h = HTrans::where("transaction_id",$t->id)->get()->first();
            $h->status = $r->transaction_status;
            $h->save();
        }else{
            $t = new Transaction();
            $t->transaction_id = $r->transaction_id;
            $t->payment_type = $r->payment_type;
            $t->order_id = $r->order_id;
            $t->gross_amount = $r->gross_amount;
        }

        $t->transaction_status = $r->transaction_status;
        $t->save();

        // /Expire Transaction
        // You can Expire transaction with transaction_status == PENDING (before it become SETTLEMENT or EXPIRE)
        // $cancel = \Midtrans\Transaction::cancel($orderId);
        // var_dump($cancel);



        // Refund Transaction
        // Refund a transaction (not all payment channel allow refund via API) You can Refund transaction with transaction_status == settlement
        // $params = array(
        //     'refund_key' => 'order1-ref1',
        //     'amount' => 10000,
        //     'reason' => 'Item out of stock'
        // );
        // $refund = \Midtrans\Transaction::refund($orderId, $params);
        // var_dump($refund);
    }

    public function payment_finish(Request $r){

    }
}
