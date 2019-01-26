<?php

use Illuminate\Database\Seeder;
use App\Blog;
use Faker\Factory as F;
use Carbon\Carbon;
use App\Kategori;
class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = F::create('id_ID');
        $limit = 16;
        $isi = 
        	"	<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas itaque, quisquam, fuga voluptate dolor ab. Deleniti ea deserunt similique beatae eos excepturi aliquid sapiente temporibus nulla magnam dicta, maiores iure?</strong></p>\r\n\r\n
           		<p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas itaque, quisquam, fuga voluptate dolor ab. Deleniti ea deserunt similique beatae eos excepturi aliquid sapiente temporibus nulla magnam dicta, maiores iure?</em></p>\r\n\r\n
           		<p><s>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas itaque, quisquam, fuga voluptate dolor ab. Deleniti ea deserunt similique beatae eos excepturi aliquid sapiente temporibus nulla magnam dicta, maiores iure?</s></p>\r\n\r\n
           		<h2 style='ont-style:italic'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas itaque, quisquam, fuga voluptate dolor ab. Deleniti ea deserunt similique beatae eos excepturi aliquid sapiente temporibus nulla magnam dicta, maiores iure?</h2>\r\n\r\n
           		<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas itaque, quisquam, fuga voluptate dolor ab. Deleniti ea deserunt similique beatae eos excepturi aliquid sapiente temporibus nulla magnam dicta, maiores iure?</h3>";
        for ($i=0; $i < $limit ; $i++) { 
        	$judul = $f->sentence($nbWords = 10, $variableNbWords = true);
        	Blog::insert([
        		'kategori_id' => $f->numberBetween($min = 1, $max = 4),
				'user_id'     => 3,
				'slug'        => slugify($judul),
				'judul'       => $judul,
				'isi'         => $isi,
				'deskripsi'   => $f->paragraph($nbSentences = 3, $variableNbSentences = true),
				'foto'        => "bae2e93eafa86224a0fa415ab3a73333.jpg",
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
        	]);
        }

        for ($i=5; $i <= 16; $i++) {
            $kat=Kategori::find($i); 
            Blog::insert([
                'kategori_id' => $i,
                'user_id'     => 3,
                'slug'        => slugify($kat->nama),
                'judul'       => $kat->nama,
                'isi'         => $isi,
                'deskripsi'   => $f->paragraph($nbSentences = 3, $variableNbSentences = true),
                'foto'        => "bae2e93eafa86224a0fa415ab3a73333.jpg",
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
