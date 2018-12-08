<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GroupUser', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('title');
            $table->string('thumb_url')->nullable();
            $table->string('uid', 30);
            $table->foreign('uid')->references('uid')->on('User')->onDelete('cascade');
            $table->integer('mode');
            $table->date('group_create_at');
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
        Schema::dropIfExists('GroupUser');
    }
}
