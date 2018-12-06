<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('judul');
            $table->text('isi');
            $table->text('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });

        Schema::table('blogs',function($t){
            $t->foreign('kategori_id')->references('id')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('blogs');
    }
}
