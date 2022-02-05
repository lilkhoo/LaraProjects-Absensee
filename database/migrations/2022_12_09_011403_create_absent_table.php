<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absents', function (Blueprint $table) {
            $table->id();
            $table->string('nama_absen');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rombel_id')->nullable();
            $table->unsignedBigInteger('rayon_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('rombel_id')->references('id')->on('rombels')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('rayon_id')->references('id')->on('rayons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tgl_dibuat');
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
        Schema::dropIfExists('absent');
    }
}
