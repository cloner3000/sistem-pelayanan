<?php

use Illuminate\Database\Seeder;

class StrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = array(
            'Fahmi pamungkas','Iwan R. Maulana','Cici Endas Rahmatika, A.Md','Hastiti Tresna Ayu',
            'Dudin Saepudin','Beni Lesmana, S.IP','Dede Abdillah, S.HI'
        );

        $foto = array();
        
        $jabatan = array(
            'Kepala Urusan perencanaan','Kepala Dusun Malinggut 1','Kepala Urusan Administrasi Umum dan Tata Usaha',
            'Kepala Urusan Keuangan / Bendahara Desa','Kepala dusun Malinggut 2','Sekretaris Desa','Kepala Seksi Pelayanan'
        );

        foreach ($nama as $key => $n) {
             DB::table('strukturs')->insert([
                'nama' => $n,
                'jabatan' => $jabatan[$key],
                'foto' => "1540301804.jpg",
                'fb' => '#',
                'twitter' => '#',
            ]);
        }
    }
}
