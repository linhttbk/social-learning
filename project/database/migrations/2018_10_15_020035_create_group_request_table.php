<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GroupRequest', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('uid', 30);// foreign key
            $table->integer('id_group');
            $table->foreign('id_group')->references('id')->on('GroupUser')->onDelete('cascade');// foreign key
            $table->dateTime('request_time');
            $table->integer('status');
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
        Schema::dropIfExists('GroupRequest');
    }
}
