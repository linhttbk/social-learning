<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LearningProgress', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('id_lesson');
            $table->foreign('id_lesson')->references('id')->on('Lesson');
            $table->string('uid', 30);
            $table->dateTime('time_start');
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
        Schema::dropIfExists('LearningProgress');
    }
}
