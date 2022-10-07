<?php

namespace App\Http\Controllers;

use App\Models\Midtrans as ModelsMidtrans;
use App\Models\Schedule;
use Illuminate\Http\Request;

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

            $mdToken = $md->payment(Schedule::find($r->scheduleId), $r->ticketQty, json_decode($r->seatList));

            return $mdToken;
        }
    }
}
