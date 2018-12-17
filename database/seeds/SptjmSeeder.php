<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
class SptjmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = Faker\Factory::create('id_ID');
        $limit = 50;
        $pekerjaan = array(
			'pns',
			'wiraswasta',
			'pelajar',
			'mahasiswa',
			'karyawan',
			'programmer',
			'ibu rumah tangga',
			'lain-lain',
        );

        for ($i=0; $i < $limit; $i++) { 
        	DB::table('sptjms')->insert([
				'user_id'        => 3,
				'status'         => $f->randomElement(array('acc','pending')),
				'no_kk'			 =>	$f->randomNumber($nbDigits = NULL, $strict = false),
				
				'nama'           => $f->name,
				'nik'            => $f->randomNumber($nbDigits = NULL, $strict = false),
				'tempat'         => "sukabumi",
				'tanggal'        => $f->date($format = 'Y-m-d', $max = 'now'),
				'pekerjaan'      => $f->randomElement($pekerjaan),
				'alamat'         => $f->address,
				
				'nama1'          => $f->name,
				'nik1'           => $f->randomNumber($nbDigits = NULL, $strict = false),
				'tempat1'        => "sukabumi",
				'tanggal1'       => $f->date($format = 'Y-m-d', $max = 'now'),
				'pekerjaan1'     => $f->randomElement($pekerjaan),
				'alamat1'        => $f->address,
				
				'nama2'          => $f->name,
				'nik2'           => $f->randomNumber($nbDigits = NULL, $strict = false),
				'tempat2'        => "sukabumi",
				'tanggal2'       => $f->date($format = 'Y-m-d', $max = 'now'),
				'pekerjaan2'     => $f->randomElement($pekerjaan),
				'alamat2'        => $f->address,
				
				's1_nama'        => $f->name,
				's1_nik'         => $f->randomNumber($nbDigits = NULL, $strict = false),
				
				's2_nama'        => $f->name,
				's2_nik'         => $f->randomNumber($nbDigits = NULL, $strict = false),
				
				'hubungan'       =>	$f->randomElement(['istri','suami']),
				
				'nama_anak'      =>	$f->name,
				'tempat_anak'    =>	'sukabumi',
				'tanggal_anak'   =>	$f->date($format = 'Y-m-d', $max = 'now'),
				'pekerjaan_anak' =>	$f->randomElement($pekerjaan),
				'alamat_anak'    =>	$f->address,
				
				'created_at'     => $f->date($format = 'Y-m-d', $max = 'now'),
				'updated_at'     => $f->date($format = 'Y-m-d', $max = 'now'),
        	]);
        }
    }
}
