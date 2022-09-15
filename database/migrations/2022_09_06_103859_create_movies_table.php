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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();

            $table->string("judul");
            $table->string("slug")->unique();
            $table->string("image");
            $table->string("producer");
            $table->string("director");
            $table->string("casts");
            $table->string("synopsis");
            $table->string("genre");
            $table->integer("duration");

            $table->string("status",1)->default("0"); //0=now playing, 1=comingsoon, 2=done playing

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
        Schema::dropIfExists('movies');
    }
};
