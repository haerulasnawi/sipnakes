<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIstrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nake_id');
            $table->foreign('nake_id')->references('id')->on('nakes');
            $table->unsignedBigInteger('jnake_id');
            $table->foreign('jnake_id')->references('id')->on('jnakes');
            $table->string('str_nomor')->nullable();
            $table->date('str_terbit')->nullable();
            $table->date('str_exp')->nullable();
            $table->integer('str_mass')->nullable();
            $table->integer('str_ket')->default(0);
            $table->string('str_name')->nullable();
            $table->string('str_link')->nullable();
            $table->integer('str_size')->nullable();
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
        Schema::dropIfExists('istrs');
    }
}
