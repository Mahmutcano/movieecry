<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();

            $table->string('mov_title');
            $table->string('video');


            $table->decimal('mov_rate');
            $table->string('mov_lınk');
            $table->string('poster');
            $table->date('mov_date');
            $table->decimal('mov_old');
            $table->decimal('mov_sesson');
            $table->string('desc');
            $table->datetime('mov_startime');
            $table->datetime('mov_endtime');
            $table->unsignedBigInteger('director_id');
            $table->foreign('director_id')->references('id')->on('directors')->onDelete('cascade');
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
        Schema::dropIfExists('movies');
    }
}