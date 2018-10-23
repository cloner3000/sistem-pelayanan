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
        $f 		= Faker\factory::create('id_ID');
        $limit 	= 12;
        $jabatan = array('Kepala Desa','Sekertaris','Bendahara');
        for ($i=0; $i < $limit; $i++) { 
        	DB::table('strukturs')->insert([
				'nama' => $f->name,
				'jabatan' => $f->randomElement($jabatan),
				'foto' => "1540301804.jpg",
				'fb' => $f->word,
				'twitter' => $f->word,
        	]);
        }
    }
}
