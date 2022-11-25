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
        Schema::create('htranssnacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("transaction_id")->nullable()->references("id")->on("transactions");
            $table->foreignId("user_id")->references("id")->on("users");
            $table->foreignId("branch_id")->references("id")->on("branches");
            $table->string("status");
            $table->integer("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htranssnacks');
    }
};
