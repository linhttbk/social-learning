<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Course', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('price');
            $table->string('uid');
            $table->integer('id_subject');
            $table->foreign('id_subject')->references('id')->on('Subject');
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
        Schema::dropIfExists('Course');
    }
}
