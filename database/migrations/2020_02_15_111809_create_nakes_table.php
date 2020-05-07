<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nakes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('jnake_id')->nullable();
            $table->foreign('jnake_id')->references('id')->on('jnakes');
            $table->string('nik', 16)->nullable();
            $table->string('nip', 18)->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->date('tgl_lahir');
            $table->char('gender', 1);
            $table->string('nakes_phone_number', 13)->nullable();
            $table->string('alamat_nakes')->nullable();
            $table->integer('mass')->nullable();
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
        Schema::dropIfExists('nakes');
    }
}
