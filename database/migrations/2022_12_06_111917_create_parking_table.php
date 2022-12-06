<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_polisi');
            $table->string('tanggal_masuk');
            $table->string('jam_masuk');
            $table->string('jenis_kendaraan');
            $table->string('tanggal_keluar')->nullable();
            $table->string('jam_keluar')->nullable();
            $table->string('biaya_parkir')->nullable();
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
        Schema::dropIfExists('parking');
    }
}
