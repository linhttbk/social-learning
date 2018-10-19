<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Account', function (Blueprint $table) {
            $table->string('uid',30);
            $table->primary('uid');
            $table->foreign('uid')->references('uid')->on('User');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->integer('status')->default(0);
            $table->integer('active')->default(0);
            $table->boolean('emailverify')->default(false);
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
        Schema::dropIfExists('Account');
    }
}
