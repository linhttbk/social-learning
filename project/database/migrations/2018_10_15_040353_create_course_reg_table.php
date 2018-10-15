<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CourseRegistration', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->integer('id_course');
            $table->foreign('id_course')->references('id')->on('Course');
            $table->string('uid', 30);
            $table->dateTime('date_reg');
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
        Schema::dropIfExists('CourseRegistration');
    }
}
