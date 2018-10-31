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
            'Hilmi Nurhikmat',
            'Beni Lesmana, S.IP',
            'Cici Endas Rahmatika, A.Md',
            'Hastiti Tresna Ayu',
            'Fahmi pamungkas',
            'Iwan R. Maulana',
            'Dudin Saepudin',
            'Dede Abdillah, S.HI',
            'Isep Saepul Rohman',
            'Handry Sulistyio H',
            'Kamal Chairil',
            'Ahmad Nurzaman'
        );

        $foto = array(
            '1540989182.JPG',
            '1540934726.jpeg',
            '1540934683.jpeg',
            '1540934702.jpeg',
            '1540934634.jpeg',
            '1540934671.jpeg',
            '1540934717.jpeg',
            '1540934649.jpeg',
            '1540971179.jpeg',
            '1540971190.jpeg',
            '1540971200.jpeg',
            '1540971210.jpeg'
        );
        
        $jabatan = array(
            'Kepala Desa',
            'Sekretaris Desa',
            'Kepala Urusan Administrasi Umum',
            'Kepala Urusan Keuangan',
            'Kepala Urusan perencanaan',
            'Kepala Dusun Malinggut 1',
            'Kepala Dusun Malinggut 2',
            'Kepala Seksi Pelayanan',
            'Kepala Dusun Malinggut 3',
            'Kepala Seksi Pemerintahan',
            'Kepala Dusun Sukamaju',
            'Kasi Kesejahteraan'
        );

        foreach ($nama as $key => $n) {
             DB::table('strukturs')->insert([
                'nama' => $n,
                'jabatan' => $jabatan[$key],
                'foto' => $foto[$key],
                'fb' => '#',
                'twitter' => '#',
            ]);
        }
    }
}
