<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeabsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_absensi', function (Blueprint $table) {
            $table->bigIncrements('IdTipe');
            $table->string('JenisAbsensi', 150);
            $table->string('Keterangan', 350); 
            $table->double('Harga');
            $table->double('Durasi'); 
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
        Schema::dropIfExists('tipeabsensi');
    }
}
