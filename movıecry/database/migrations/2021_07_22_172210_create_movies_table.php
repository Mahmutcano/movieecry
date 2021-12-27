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
            $table->longText('mtitle');
            $table->string('mtime')->nullable();
            $table->longText('mname');
            $table->string('mvideo');
            $table->string('mimg');
            $table->foreignId('genre_id')->nullable()->index();
            $table->string('mold');
            $table->date('myear');
            $table->string('mseason');
            $table->string('alttitle');
            $table->string('altdesc');
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
        Schema::dropIfExists('movies');
    }
}