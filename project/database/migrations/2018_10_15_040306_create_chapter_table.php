<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Chapter', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->integer('id_subject');
            $table->foreign('id_subject')->references('id')->on('Subject')->onDelete('cascade');
            $table->string('title');
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
        Schema::dropIfExists('Chapter');
    }
}
