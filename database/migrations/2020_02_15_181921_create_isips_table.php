<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nake_id');
            $table->foreign('nake_id')->references('id')->on('nakes');
            $table->unsignedBigInteger('faske_id');
            $table->foreign('faske_id')->references('id')->on('faskes');
            $table->unsignedBigInteger('jnake_id');
            $table->foreign('jnake_id')->references('id')->on('jnakes');
            $table->string('sip_nomor')->nullable();
            $table->date('sip_aktif')->nullable();
            $table->string('sip_link')->nullable();
            $table->integer('sip_size')->nullable();
            $table->string('berkas_link')->nullable();
            $table->integer('berkas_size')->nullable();
            $table->integer('sip_ket')->default(0);
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
        Schema::dropIfExists('isips');
    }
}
