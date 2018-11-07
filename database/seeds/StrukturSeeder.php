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
            '1LuUdwmXwDooc8j8DLVPVC_tECQPLHeGx',
            '1_h0kGMcCssqlk5P2N-k7VUISdDoLxL10',
            '1Ffl9S90SBY4QoMyWVz8lcVhQq6TmFMdB',
            '107lGuo_5_4SCx4rHCy4e8pqBqcuK9SuT',
            '1UXmZ3yDQkRsHlrRxXuxkHyjNmOecmreu',
            '1LaZ7gbLhtpBjoMNCnu-f0-h5BqfpCFxw',
            '1qbQ7M78iuzYNqX-IpA6fXBDUH5_rRXD5',
            '1Js2JP_ROzNGKqj_27MY8CZIM-chGfWoq',
            '1cltSLvLlUOe3RG5bpxasBDGW99TwLiqh',
            '1_z64AH5jAig4oyass6_G9Ma5Nv5tp9cO',
            '1SPIfXq1THxPQJcgWW6-ejvrCULCXs5UW',
            '1X56KsrxgDHbAUph2Tn6a8wq-QuxqYF8c',
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
