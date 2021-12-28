<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epgs', function (Blueprint $table) {
            $table->id();
            $table->time('start_time', 0);
            $table->time('end_time', 0);
            $table->date('timezone', 30);
            $table->string('eimg');
            $table->string('ename');
            $table->longText('elink');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('epgs');
    }
}