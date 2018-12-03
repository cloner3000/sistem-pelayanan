<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SktmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = Faker\Factory::create('id_ID');

        $limit = 30;
        $pekerjaan = array("Pegawai Negeri Sipil","Petani","Wiraswasta");

        for ($i=0; $i < $limit; $i++) { 
        	DB::table('sktms')->insert([
				'user_id' => 3,
				'nama' => $f->name,
                'status' => $f->randomElement(array('acc','pending')),
				'jenis_kelamin' => $f->randomElement(array('laki-laki','perempuan')),
				'nik' => $f->randomNumber($nbDigits = NULL, $strict = false),
				'tempat' => "sukabumi",
				'tanggal' => $f->date($format = 'Y-m-d', $max = 'now'),
				'kewarganegaraan' => "indonesia",
				'agama' => "islam",
				'pekerjaan' => $f->randomElement($pekerjaan),
				'alamat' => $f->address,
                'keperluan'=> "Sekolah",
                'n_ayah'=> $f->name,
                'n_ibu'=> $f->name,
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	]);
        }
    }
}
