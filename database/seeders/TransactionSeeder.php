<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            "id"=>1,
            "transaction_status"=>"settlement",
            "transaction_id"=>"asd",
            "payment_type"=>"transfer",
            "order_id"=>"asd",
            "gross_amount"=>"asd"
        ]);
        Transaction::create([
            "id"=>2,
            "transaction_status"=>"settlement",
            "transaction_id"=>"abc",
            "payment_type"=>"transfer",
            "order_id"=>"abc",
            "gross_amount"=>"abc"
        ]);
        Transaction::create([
            "id"=>3,
            "transaction_status"=>"settlement",
            "transaction_id"=>"qwe",
            "payment_type"=>"transfer",
            "order_id"=>"qwe",
            "gross_amount"=>"qwe"
        ]);
        Transaction::create([
            "id"=>4,
            "transaction_status"=>"settlement",
            "transaction_id"=>"iioj",
            "payment_type"=>"cash",
            "order_id"=>"ajdoas",
            "gross_amount"=>"jnkjn"
        ]);
        Transaction::create([
            "id"=>5,
            "transaction_status"=>"settlement",
            "transaction_id"=>"kancalnc",
            "payment_type"=>"paypall",
            "order_id"=>"aiusj",
            "gross_amount"=>"ksjni"
        ]);
        Transaction::create([
            "id"=>6,
            "transaction_status"=>"settlement",
            "transaction_id"=>"ojdieq",
            "payment_type"=>"cash",
            "order_id"=>"kssjancl",
            "gross_amount"=>"nddsik"
        ]);
        Transaction::create([
            "id"=>7,
            "transaction_status"=>"settlement",
            "transaction_id"=>"laksd",
            "payment_type"=>"cash",
            "order_id"=>"cjkns",
            "gross_amount"=>"snwiod"
        ]);
        Transaction::create([
            "id"=>8,
            "transaction_status"=>"settlement",
            "transaction_id"=>"poaskdp",
            "payment_type"=>"cash",
            "order_id"=>"ndoieo",
            "gross_amount"=>"sdkdmw"
        ]);
        Transaction::create([
            "id"=>9,
            "transaction_status"=>"settlement",
            "transaction_id"=>"dnwidw",
            "payment_type"=>"cash",
            "order_id"=>"ajsnwid",
            "gross_amount"=>"qudhni"
        ]);
        Transaction::create([
            "id"=>10,
            "transaction_status"=>"settlement",
            "transaction_id"=>"asjo",
            "payment_type"=>"cash",
            "order_id"=>"asani",
            "gross_amount"=>"dmoaij"
        ]);
        Transaction::create([
            "id"=>11,
            "transaction_status"=>"settlement",
            "transaction_id"=>"aasao",
            "payment_type"=>"cash",
            "order_id"=>"cjcoid",
            "gross_amount"=>"shdeo"
        ]);
    }
}
