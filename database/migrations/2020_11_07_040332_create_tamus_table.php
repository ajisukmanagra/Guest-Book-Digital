<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tamu', 50);
            $table->string('nik_ktp', 50);
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->text('deskripsi');
            $table->enum('tujuan', [1, 2, 3, 4, 5, 6, 7]);
            $table->string('foto');
            $table->date('tanggal');
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
        Schema::dropIfExists('tamus');
    }
}
