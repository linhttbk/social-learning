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
            $table->integer('id',11);
            $table->string('title');
            $table->string('thumb_url');
            $table->string('uid', 30);
            $table->integer('mode');
            $table->date('create_at');
            $table->string('des');
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
