<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("transaction_status");
            $table->string("transaction_id");
            $table->string("payment_type");
            $table->string("order_id");
            $table->string("gross_amount");
            $table->timestamps();

            // {
            //     "va_numbers": [
            //       {
            //         "va_number": "69566368424",
            //         "bank": "bca"
            //       }
            //     ],
            //     "transaction_time": "2022-11-06 19:52:21",
            //     "transaction_status": "pending",
            //     "transaction_id": "07365903-bf3e-49f2-a5ea-46f555edfd43",
            //     "status_message": "midtrans payment notification",
            //     "status_code": "201",
            //     "signature_key": "529ee20d00e75a5c1cf08a74c62af26cae0243dadf0d8db9b60ca113d29e20d8424d4eca1236fe5982134ef068250a357a5b45c29d58172c6fed4ad0c7ecbcf1",
            //     "payment_type": "bank_transfer",
            //     "payment_amounts": [
              
            //     ],
            //     "order_id": "769227339",
            //     "merchant_id": "G446569566",
            //     "gross_amount": "135000.00",
            //     "fraud_status": "accept",
            //     "currency": "IDR"
            //   }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
};
