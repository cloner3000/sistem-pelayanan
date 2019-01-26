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
            'Naruto Uzumaki',
            'Sasuke Uchiha',
            'Sakura Haruno',
            'Raikage',
            'Tsuchikage',
            'Kazekage',
            'Mizukage',
            'Madara Uchiha',
            'Obito Uchiha',
            'Orochimaru',
            'Uchiha Itachi',
            'Shisui Uchiha'
        );

        $foto = array(
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
            '24864f80e5eebefefc1716fe991886ce.jpg',
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
