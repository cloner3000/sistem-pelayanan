<?php

use Illuminate\Database\Seeder;
use App\Kategori;
use Faker\Factory as f;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = f::create('id_ID');
        $kategori=array('Berita','Keamanan','Kebersihan','Lomba');

        foreach ($kategori as $key => $value) {
        	Kategori::insert([
        		'nama' => $value,
        		'slug' => slugify($value),
        	]);
        }
    }
}
