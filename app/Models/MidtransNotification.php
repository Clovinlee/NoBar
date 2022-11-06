<?php

namespace App\Models;

use App\Models\Htrans;
use App\Models\Midtrans as ModelsMidtrans;
use App\Services\Midtrans\Midtrans;


class MidtransNotification extends ModelsMidtrans{

    protected $notification;
    protected $htrans;
    protected $serverKey;

    public function __construct()
    {
        parent::__construct();

        $this->serverKey = env("MIDTRANS_SERVERKEY");
        $this->_handleNotification();
    }

    public function isSignatureKeyVerified()
    {
        return ($this->_createLocalSignatureKey() == $this->notification->signature_key);
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }

    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getOrder()
    {
        return $this->order;
    }

    protected function _createLocalSignatureKey()
    {
        $orderId = $this->order->number;
        $statusCode = $this->notification->status_code;
        $grossAmount = $this->order->total_price;
        $serverKey = $this->serverKey;
        $input = $orderId . $statusCode . $grossAmount . $serverKey;
        $signature = openssl_digest($input, 'sha512');

        return $signature;
    }

    protected function _handleNotification()
    {
        $notification = new \Midtrans\Notification();
        $orderNumber = $notification->order_id;

        $ht = Htrans::where('order_id', $orderNumber)->first();

        $this->notification = $notification;
        $this->htrans = $ht;
    }

}
?>