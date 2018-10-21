<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class KtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$faker = Faker\Factory::create('id_ID');
    	$limit = 50;
    	$permohonan = array('baru','perpanjangan','penggantian');
        $status = array("pending","acc");
        
        for ($i=0; $i < $limit ; $i++) { 
            DB::table('ktps')->insert([
                'user_id' => 3,
                'provinsi' => $faker->state,
                'kabupaten' => $faker->city,
                'kecamatan' => $faker->citySuffix,
                'desa' => $faker->streetName,
                'nama' => $faker->name,
                'permohonan' => $faker->randomElement($permohonan),
                'no_kk' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'nik' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'alamat' => $faker->address,
                'status' => $faker->randomElement($status),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
