<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

    class Midtrans{

        static $instance = null;

        public function __construct()
        {
            $this->initialize();
        }

        public function initialize(){
           \Midtrans\Config::$serverKey = env("MIDTRANS_SERVERKEY");
           \Midtrans\Config::$clientKey = env("MIDTRANS_CLIENTKEY");
           \Midtrans\Config::$isProduction = env("MIDTRANS_PRODUCTION");
           \Midtrans\Config::$isSanitized = env("MIDTRANS_SANITIZED");
           \Midtrans\Config::$is3ds = env("MIDTRANS_3DS");
        }

        public static function getInstance() : Midtrans{
            if(!isset(Midtrans::$instance)){
                Midtrans::$instance = new Midtrans();
            }
            return Midtrans::$instance;
        }

        public function payment($schedule, $ticket_qty, $seatList){

            $total_price = $schedule->price * $ticket_qty;

            $transaction_details = array(
                'order_id' => rand(),
                'gross_amount' => $total_price, 
                'total_seat' => count($seatList),
            );

            $item_details = [];
            foreach ($seatList as $k => $v) {
                $t = [
                    "id"=> $v,
                    "quantity" => 1,
                    "price"=>$schedule->price,
                    "name"=>"Seat ".$v,
                ];
                array_push($item_details,$t);
            }

            // $item_details = array (
            //     array(
            //         'id' => 'a1',
            //         'price' => 45000,
            //         'quantity' => 1,
            //         'name' => "Apple"
            //     ),
            // );

            $usr = Auth()->user();

            // Optional
            $customer_details = array(
                'full_name'    => $usr->name,
                'email'         => $usr->email,
            );

            $custom_expiry = array(
                "expiry_duration"=>1,
                "unit"=>"minute",
            );

            // Fill transaction details
            $transaction = array(
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
                "custom_expity" => $custom_expiry,
            );

            $snap_token = '';

            try {
                $snap_token = \Midtrans\Snap::getSnapToken($transaction);
            } catch (\Throwable $th) {
                //throw $th;
                echo $th->getMessage();
            }

            return $snap_token;
        }

    }
?>