<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalRollingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalrolling', function (Blueprint $table) {
            $table->bigIncrements('IdJadwal');
            $table->integer('IdAnak');
            $table->string('NoIdentitas', 45);
            $table->date('Tanggal');
            $table->time('Waktu')->nullable();
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
        Schema::dropIfExists('jadwal_rolling');
    }
}