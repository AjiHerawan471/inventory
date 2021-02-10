<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status_peminjaman', ['dipinjam', 'dikembalikan']);
            $table->unsignedBigInteger('id_pegawai');

            $table->timestamps();

            $table->foreign('id_pegawai')->references('id')->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
