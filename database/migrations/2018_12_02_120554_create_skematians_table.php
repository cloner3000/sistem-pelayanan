<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skematians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('status')->default('pending');
            $table->string('nama');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('alamat');

            $table->date('waktu');
            $table->string('tempat');
            $table->string('penyebab');
            
            $table->string('p_nama');
            $table->string('p_nik');
            $table->string('p_tempat');
            $table->date('p_tanggal');
            $table->string('p_pekerjaan');
            $table->string('p_alamat');
            $table->string('p_hubungan');

            $table->timestamps();
        });

        Schema::table('skematians',function($t){
            $t->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skematians');
    }
}
