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
            $table->integer('id')->primary();
            $table->integer('channels_id');
            $table->dateTimeTz('start_time', 0);
            $table->dateTimeTz('end_time', 0);
            $table->string('timezone', 30);
            $table->string('eimg');
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