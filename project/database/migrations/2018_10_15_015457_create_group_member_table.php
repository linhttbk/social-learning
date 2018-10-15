<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GroupMember', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('id_group');
            $table->foreign('id_group')->references('id')->on('GroupUser')->onDelete('cascade');// foreign key
            $table->string('uid','30');// foreign key
            $table->integer('role')->default(0);
            $table->date('join_date');
            $table->string('add_uid',30); // foreign key
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
        Schema::dropIfExists('GroupMember');
    }
}
