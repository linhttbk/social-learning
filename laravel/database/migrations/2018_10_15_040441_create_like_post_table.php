<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LikePost', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->integer('id_post')->nullable();
            $table->integer('id_cmt')->nullable();
            $table->foreign('id_post')->references('id')->on('Post');
            $table->foreign('id_cmt')->references('id')->on('Comment');
            $table->string('uid', 30);
            $table->dateTime('like_at');
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
        Schema::dropIfExists('LikePost');
    }
}
