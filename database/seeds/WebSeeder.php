<?php

use Illuminate\Database\Seeder;

class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('webs')->insert([
			'nama_website'      => "Contoh",
			'judul_slider'      => "Contoh judul",
			'deskripsi_slider'  => "Blablablablablablablablabla",
			'foto_slider'       => "1540040137.jpg",
			'judul_slider1'     => "Contoh judul",
			'deskripsi_slider1' => "Blablablablablablablablabla",
			'foto_slider1'      => "1540040138.jpg",
			'tentang'           => "BlablablablablablablablablaBlablablablablablablablablaBlablablablablablablablabla",
			'foto_tentang'      => 	"1540040138.jpg",
			'tentang1'          => "BlablablablablablablablablaBlablablablablablablablablaBlablablablablablablablabla",
			'visi'              => "BlablablablablablablablablaBlablablablablablablablablaBlablablablablablablablabla",
			'misi'              => "BlablablablablablablablablaBlablablablablablablablablaBlablablablablablablablabla",
			'tlp'               => "099999999999",
			'email'             => "admin@admin.com",
			'fb'                => "contoh",
			'twitter'           => "contoh",
			'ig'                => "contoh",
        ]);
    }
}
