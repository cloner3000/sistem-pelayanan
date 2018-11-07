<?php

use Illuminate\Database\Seeder;

class StrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

          App\Struktur {#905
         id: 1,
         nama: "Naruto Uzumaki",
         jabatan: "Kepala Desa",
         foto: "1LuUdwmXwDooc8j8DLVPVC_tECQPLHeGx",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 01:57:22",
       },
       App\Struktur {#906
         id: 2,
         nama: "Sasuke Uchiha",
         jabatan: "Sekretaris Desa",
         foto: "1_h0kGMcCssqlk5P2N-k7VUISdDoLxL10",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:01:57",
       },
       App\Struktur {#907
         id: 3,
         nama: "Sakura Haruno",
         jabatan: "Kepala Urusan Administrasi Umum",
         foto: "1Ffl9S90SBY4QoMyWVz8lcVhQq6TmFMdB",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:06:06",
       },
       App\Struktur {#908
         id: 4,
         nama: "Hastiti Tresna Ayu",
         jabatan: "Kepala Urusan Keuangan",
         foto: "107lGuo_5_4SCx4rHCy4e8pqBqcuK9SuT",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:06:35",
       },
       App\Struktur {#909
         id: 5,
         nama: "Tsuchikage",
         jabatan: "Kepala Urusan perencanaan",
         foto: "1UXmZ3yDQkRsHlrRxXuxkHyjNmOecmreu",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:07:37",
       },
       App\Struktur {#910
         id: 6,
         nama: "Kazekage",
         jabatan: "Kepala Dusun Malinggut 1",
         foto: "1LaZ7gbLhtpBjoMNCnu-f0-h5BqfpCFxw",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:10:06",
       },
       App\Struktur {#911
         id: 7,
         nama: "Mizukage",
         jabatan: "Kepala dusun Malinggut 2",
         foto: "1qbQ7M78iuzYNqX-IpA6fXBDUH5_rRXD5",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:10:56",
       },
       App\Struktur {#912
         id: 8,
         nama: "Madara Uchiha",
         jabatan: "Kepala Seksi Pelayanan",
         foto: "1Js2JP_ROzNGKqj_27MY8CZIM-chGfWoq",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:17:35",
       },
       App\Struktur {#913
         id: 9,
         nama: "Obito Uchiha",
         jabatan: "Kepala Dusun Malinggut 3",
         foto: "1cltSLvLlUOe3RG5bpxasBDGW99TwLiqh",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:18:15",
       },
       App\Struktur {#914
         id: 10,
         nama: "Orochimaru",
         jabatan: "Kepala Seksi Pemerintahan",
         foto: "1_z64AH5jAig4oyass6_G9Ma5Nv5tp9cO",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:18:47",
       },
       App\Struktur {#915
         id: 11,
         nama: "Uchiha Itachi",
         jabatan: "Kepala Dusun Sukamaju",
         foto: "1SPIfXq1THxPQJcgWW6-ejvrCULCXs5UW",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:20:53",
       },
       App\Struktur {#916
         id: 12,
         nama: "Shisui Uchiha",
         jabatan: "Kasi Kesejahteraan",
         foto: "1X56KsrxgDHbAUph2Tn6a8wq-QuxqYF8c",
         fb: "#",
         twitter: "#",
         created_at: null,
         updated_at: "2018-11-07 02:21:30",
       },
     ],


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
