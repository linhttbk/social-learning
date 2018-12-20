<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('CoursePlan', function (Blueprint $table) {
            $table->integer('id_course');
            $table->integer('id_lesson');
            $table->primary(array('id_course', 'id_lesson'));
            $table->foreign('id_course')->references('id')->on('Course')->onDelete('cascade');
            $table->foreign('id_lesson')->references('id')->on('Lesson')->onDelete('cascade');
            $table->timestamp('opendate');
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
        Schema::dropIfExists('CoursePlan');
    }
}
