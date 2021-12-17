<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxPendaftaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_pendaftaran', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftaran_id');
            $table->string('nopol');
            $table->date('tgl_stnk');
            $table->date('tgl_pajak');
            $table->foreign('pendaftaran_id')->references('id')->on('tbl_master_pendaftaran')->onDelete('cascade');
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
        Schema::dropIfExists('trx_pendaftaran');
    }
}
