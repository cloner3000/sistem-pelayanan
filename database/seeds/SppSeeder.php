<?php

use Illuminate\Database\Seeder;

use App\Spp;
use Carbon/Carbon;
class SppSeeder extends Seeder
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
        $status = array('pending','acc');
        for ($i=0; $i < $limit; $i++) { 
        	DB::table('spps')->insert([
        		'user_id' => 3,
        		'nik' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        		'nama' => $faker->name,
        		'no_kk' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        		'kepala_keluarga' => $faker->name,
				'alamat_sekarang' => $faker->address,
				'alamat_tujuan' => $faker->address,
				'jumlah_pindah' => $faker->numberBetween(3,6),
                'status' => $faker->randomElement($status),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	]);
        }
    }
}
