<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('kondisi');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_jenis');
            $table->date('tanggal_register');
            $table->unsignedBigInteger('id_ruang');
            $table->string('kode_inventaris');
            $table->unsignedBigInteger('id_petugas');

            $table->timestamps();

            $table->foreign('id_jenis')->references('id')->on('jenis');
            $table->foreign('id_ruang')->references('id')->on('ruangs');
            $table->foreign('id_petugas')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}
