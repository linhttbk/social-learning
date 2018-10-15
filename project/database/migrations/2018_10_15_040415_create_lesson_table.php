<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Lesson', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->integer('id_chapter');
            $table->foreign('id_chapter')->references('id')->on('Chapter');
            $table->string('title');
            $table->string('url');
            $table->string('url_doc');
            $table->string('des');
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
        Schema::dropIfExists('Lesson');
    }
}
