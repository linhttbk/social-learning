<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Post', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('content');
            $table->string('url')->nullable();
            $table->integer('id_group')->nullable();
            $table->foreign('id_group')->references('id')->on('GroupUser')->onDelete('cascade');
            $table->string('uid', 30);
            $table->string('url_attach')->nullable();
            $table->dateTime('create_at');
            $table->dateTime('update_at')->nullable();
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
        Schema::dropIfExists('Post');
    }
}
