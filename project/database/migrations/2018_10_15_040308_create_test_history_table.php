<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TestHistory', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->integer('id_test');
            $table->foreign('id_test')->references('id')->on('Test');
            $table->string('uid', 30);
            $table->foreign('uid')->references('uid')->on('User');
            $table->integer('score');
            $table->dateTime('time_start');
            $table->dateTime('time_finish');
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
        Schema::dropIfExists('TestHistory');
    }
}
