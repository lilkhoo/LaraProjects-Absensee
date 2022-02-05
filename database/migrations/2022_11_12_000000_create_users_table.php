<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nis')->unique()->nullable();
            $table->unsignedBigInteger('rombel_id')->nullable();
            $table->unsignedBigInteger('rayon_id')->nullable();
            $table->foreign('rombel_id')->references('id')->on('rombels')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('rayon_id')->references('id')->on('rayons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('email')->unique();
            $table->enum('roles', ['siswa', 'admin'])->default('siswa');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
