<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nik');
            $table->string('nama');
            $table->string('no_kk');
            $table->string('kepala_keluarga');
            $table->string('alamat_sekarang');
            $table->string('alamat_tujuan');
            $table->string('jumlah_pindah');
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::table('spps',function(Blueprint $t){
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spps');
    }
}
