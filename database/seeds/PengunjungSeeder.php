<?php

use Illuminate\Database\Seeder;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = Faker\Factory::create('id_ID');
		$limit    = 200;
		$users 		= [
    					'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:58.0) Gecko/20100101 Firefox/58.0',
    					'Mozilla/5.0 (X11; Window; window x86_64; rv:57.0) Gecko/20100101 Firefox/57.0'
    			  	  ];
    	$browsers	= ['UC Browser','Firefox','Chrome','Iceweals','Safari'];
    	$oses		= ['MacOS','Linux','Window'];
        $platform   = ['Desktop','Tab','Mobile'];

    	for ($i=0; $i < $limit ; $i++) { 
    		DB::table('pengunjungs')->insert([
    			'users' => $f->randomElement($users),
				'browsers' => $f->randomElement($browsers),
				'oses' => $f->randomElement($oses),
                'platform' => $f->randomElement($platform),
                'created_at' => $f->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'updated_at' => $f->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null)
    		]);
    	}
    }
}
