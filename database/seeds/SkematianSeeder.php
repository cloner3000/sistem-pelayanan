<?php

use Illuminate\Database\Seeder;
use App\Skematian;
use Faker\Factory as factory;
class SkematianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 50;
        $f = factory::create('id_ID');
        for ($i=0; $i < $limit; $i++) { 
        	Skematian::insert([
				'user_id' =>3,
				'nama' =>$f->name,
				'status' => $f->randomElement(['acc','pending']),
				'nik' =>$f->unixTime($max='now'),
				'jenis_kelamin' =>$f->randomElement(['laki-laki','perempuan']),
				'tanggal_lahir' =>$f->date($format = 'Y-m-d', $max = 'now'),
				'agama' =>'islam',
				'alamat' =>$f->address,
				'waktu' =>$f->date($format = 'Y-m-d', $max = 'now'),
				'tempat' =>'Sukabumi',
				'penyebab' =>$f->randomElement(['Sakit','Kecelakaan']),
				'p_nama' =>$f->name,
				'p_nik' =>$f->unixTime($max='now'),
				'p_tempat' =>'Sukabumi',
				'p_tanggal' =>$f->date($format = 'Y-m-d', $max = 'now'),
				'p_pekerjaan' =>$f->randomElement(['Buruh','Wiraswasta','PNS']),
				'p_alamat' =>$f->address,
				'p_hubungan' =>$f->randomElement(['kerabat','Anak kandung','Ibu','Ayah']),
        	]);
        }
    }
}
