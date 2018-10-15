<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('nama_kepala_keluarga');
            $table->string('no_kk');
            $table->string('status')->default('pending');
            
            $table->string('b_nama');
            $table->string('b_jenis_kelamin');
            $table->string('b_tempat');
            $table->dateTime('b_tanggal');
            $table->string('b_jenis_kelahiran');
            $table->string('b_kelahiran_ke');
            $table->string('b_berat');
            $table->string('b_panjang');
            
            $table->string('i_nik');
            $table->string('i_nama');
            $table->date('i_tanggal_lahir');
            $table->string('i_pekerjaan');
            $table->string('i_alamat');
            $table->string('i_kewarganegaraan');
            $table->string('i_kebangsaan');
            $table->string('i_tanggal_perkawinan');
            
            $table->string('a_nik');
            $table->string('a_nama');
            $table->date('a_tanggal_lahir');
            $table->string('a_pekerjaan');
            $table->string('a_alamat');
            $table->string('a_kewarganegaraan');
            $table->string('a_kebangsaan');
            $table->string('a_tanggal_perkawinan');

            $table->string('p_nik');
            $table->string('p_nama');
            $table->integer('p_umur');
            $table->string('p_jenis_kelamin');
            $table->string('p_pekerjaan');
            $table->string('p_alamat');

            $table->string('s1_nik');
            $table->string('s1_nama');
            $table->integer('s1_umur');
            $table->string('s1_pekerjaan');
            $table->string('s1_alamat');

            $table->string('s2_nik');
            $table->string('s2_nama');
            $table->integer('s2_umur');
            $table->string('s2_pekerjaan');
            $table->string('s2_alamat');

            $table->timestamps();
        });

        Schema::table('skks',function(Blueprint $t){
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
        Schema::dropIfExists('skks');
    }
}
