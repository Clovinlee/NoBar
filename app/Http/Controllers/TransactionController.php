<?php

namespace App\Http\Controllers;

use App\Models\Htrans;
use App\Models\Midtrans as ModelsMidtrans;
use App\Models\MidtransNotification as ModelsMidtransNotification;
use App\Models\MidtransNotification\MidtransNotification;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
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

            $mdToken = $md->payment(Schedule::find($r->scheduleId), $r->ticketQty, json_decode($r->seatList));

            return $mdToken;
        }
    }

    public function transactionSuccess(Request $r){
        if($r->ajax()){
            $h = new Htrans;
            $h->user_id = 1;
            $h->schedule_id = 2;
            $h->total = 50000;
            $h->status = 1;
            $h->save();
        }
    }

    public function payment_success(Request $r){
        // $m = ModelsMidtrans::getInstance();
        // $m->initialize();
        // $status = \Midtrans\Transaction::status($r->id);
        // dd($status);
    }

    public function payment_finish(Request $r){

        // $md = ModelsMidtrans::getInstance();
        // $md->initialize();

        // $notif = new \Midtrans\Notification();
        // return redirect(env("APP_URL"));
    }

    public function payment_unfinished(){
        
    }

    public function payment_failed(){
        
    }
}
