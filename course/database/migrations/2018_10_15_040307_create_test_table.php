<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Test', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('id_course')->nullable();
            $table->integer('id_chap')->nullable();
            $table->foreign('id_chap')->references('id')->on('Chapter');
            $table->foreign('id_course')->references('id')->on('Course');
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
        Schema::dropIfExists('Test');
    }
}
