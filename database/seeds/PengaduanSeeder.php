<?php

use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = Faker\factory::create('id_ID');
        $limit = 50;
        $status= array('pending','acc');
        $pekerjaan = array('buruh','wiraswasta','PNS');
        $sasaran = array('Kepala Desa','Sekretaris Desa');

        for ($i=0; $i < $limit ; $i++) { 
        	DB::table('pengaduans')->insert([
        		'user_id' => 3,
				'nama' => $f->name,
				'nik' => $f->randomNumber($nbDigits = NULL, $strict = false),
				'tanggal_lahir' => $f->date($format = 'Y-m-d', $max = 'now'),
				'pekerjaan' => $f->randomElement($pekerjaan),
				'alamat' => $f->address,
				'sasaran' => $f->randomElement($sasaran),
				'status' => $f->randomElement($status),
				'isi' => $f->word,
				'alternatif' => $f->word,
				'created_at' => $f->date($format = 'Y-m-d', $max = 'now'),
				'updated_at' => $f->date($format = 'Y-m-d', $max = 'now'),

        	]);
        }
    }
}
