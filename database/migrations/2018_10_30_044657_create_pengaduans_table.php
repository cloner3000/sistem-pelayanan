<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('nama');
            $table->string('nik');
            $table->string('tanggal_lahit');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('sasaran');
            $table->text('isi');
            $table->text('alternatif');
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
        Schema::dropIfExists('pengaduans');
    }
}
