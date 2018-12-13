<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('from');
            $table->string('uid_to',30);
            $table->foreign('uid_to')->references('uid')->on('User');
            $table->string('content');
            $table->dateTime('send_at');
            $table->string('url_redirect');
            $table->string('avatar_from');
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
        Schema::dropIfExists('notification');
    }
}
