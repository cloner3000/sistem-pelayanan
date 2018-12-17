<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSptjmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sptjms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('status')->default('pending');
            $table->string('no_kk');

            $table->string('nama');
            $table->string('nik');
            $table->string('tempat');
            $table->date('tanggal');
            $table->string('pekerjaan');
            $table->string('alamat');

            $table->string('nama1');
            $table->string('nik1');
            $table->string('tempat1');
            $table->date('tanggal1');
            $table->string('pekerjaan1');
            $table->string('alamat1');
            
            $table->string('nama2');
            $table->string('nik2');
            $table->string('tempat2');
            $table->date('tanggal2');
            $table->string('pekerjaan2');
            $table->string('alamat2');

            $table->string('s1_nama');
            $table->string('s1_nik');

            $table->string('s2_nama');
            $table->string('s2_nik');

            $table->enum('hubungan',['suami','istri']);

            $table->string('nama_anak')->nullable();
            $table->string('tempat_anak')->nullable();
            $table->date('tanggal_anak')->nullable();
            $table->string('pekerjaan_anak')->nullable();
            $table->string('alamat_anak')->nullable();

            $table->timestamps();
        });

        Schema::table('sptjms',function(Blueprint $t){
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
        Schema::dropIfExists('sptjms');
    }
}
