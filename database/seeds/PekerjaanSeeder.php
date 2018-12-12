<?php

use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = [
        	'Petani','Nelayan','Tandur','Koki','Tukang Tenun','Psikolog','Pemadam Kebakaran','Pedagang','Sopir','Presiden','Arsitek',
        	'Tukang Taman','Tukang Las','Tukang Cukur','Kuli Bangunan','Guru','Dokter','Perawat','Apoteker','Pengantar Barang',
        	'Penjual Bunga','Pandai Besi','Kasir','Karyawan Pabrik','Programmer','Desainer Pakaian','Desainer Grafis','Montir','Pilot',
        	'Penjahit','Tukang Ledeng','Tukang Kayu','Politikus','Penambang','Peneliti','Polisi','Tentara','Pengrajin Ukir Kayu',
        	'Penjual Koran','Penebang Pohon','Fotografer','Peternak','Pelayan','Resepsionis','Pelukis','Pesepakbola','Pengrajin Kaca',
        	'Pengrajin Gerabah'
        ];

        foreach ($p as $key => $v) {
        	DB::table('pekerjaans')->insert([
        		'nama' =>$v,
        		'slug' =>slugify($v),
        	]);
        }
    }
}
