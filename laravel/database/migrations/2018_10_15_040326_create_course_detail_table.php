<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CourseDetail', function (Blueprint $table) {
            $table->integer('id_course');
            $table->integer('id_chap');
            $table->primary(['id_course','id_chap']);
            $table->foreign('id_course')->references('id')->on('Course');
            $table->foreign('id_chap')->references('id')->on('Chapter');
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
        Schema::dropIfExists('CourseDetail');
    }
}
