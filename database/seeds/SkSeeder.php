<?php

use Illuminate\Database\Seeder;
use App\Sk;
use Faker\Factory as factory;
class SkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = factory::create('id_ID');
        $limit = 30;

        for ($i=0; $i < $limit; $i++) { 
			Sk::insert([
				'user_id' => 3,
				'status' => $f->randomElement(array('acc','pending')),
				'nama' => $f->name,
				'jenis_kelamin' => $f->randomElement(['laki-laki','perempuan']),
				'nik' => $f->unixTime($max='now'),
				'tempat' => 'sukabumi',
				'tanggal' => $f->date($format = 'Y-m-d', $max = 'now'),
				'kewarganegaraan' => 'indonesia',
				'agama' => 'islam',
				'pekerjaan' => $f->randomElement(['pns','wiraswasta']),
				'alamat' => $f->address,
				'keperluan' => $f->randomElement(['domisili tempat tinggal']),
				'keterangan' => 'bepergian keluar kota',
			]);
        }
    }
}
