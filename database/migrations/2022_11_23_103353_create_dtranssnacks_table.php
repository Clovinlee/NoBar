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
        Schema::create('dtranssnacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("htranssnack_id")->references("id")->on("htranssnacks");
            $table->foreignId("snack_id")->references("id")->on("snacks");
            $table->integer("harga");
            $table->integer("qty");
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
        Schema::dropIfExists('dtranssnacks');
    }
};
