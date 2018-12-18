<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rate', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('uid', 30);
            $table->integer('vote');
            $table->integer('id_course');
            $table->foreign('uid')->references('uid')->on('User');
            $table->foreign('id_course')->references('id')->on('Course');
            $table->string('comment');
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
        Schema::dropIfExists('Rate');
    }
}
