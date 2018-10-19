<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_website');
            $table->string('judul_slider');
            $table->string('deskripsi_slider');
            $table->string('foto_slider');
            $table->string('judul_slider1');
            $table->string('deskripsi_slider1');
            $table->string('foto_slider1');
            $table->string('judul_slider2');
            $table->string('deskripsi_slider2');
            $table->string('foto_slider2');
            $table->string('judul_slider3');
            $table->string('deskripsi_slider3');
            $table->string('foto_slider3');
            $table->string('tentang');
            $table->text('visi_misi');
            $table->string('tlp');
            $table->string('email');
            $table->string('fb')->default('#');
            $table->string('twitter')->default('#');
            $table->string('ig')->default('#');
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
        Schema::dropIfExists('webs');
    }
}
