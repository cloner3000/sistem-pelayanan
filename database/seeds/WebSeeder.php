<?php

use Illuminate\Database\Seeder;

class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('webs')->insert([
			'nama_website'      => "Contoh",
			'judul_slider'      => "Contoh judul",
			'deskripsi_slider'  => "Blablablablablablablablabla",
			'foto_slider'       => "1o8-ZmI1Bjx22VRHipRNSofnNQJEbNFz4",
			'judul_slider1'     => "Contoh judul",
			'deskripsi_slider1' => "Blablablablablablablablabla",
			'foto_slider1'      => "1j2nXcoa55aSOG7CKBgMwcbMHfR5CvYxu",
			'tentang'           => "<h3>KONOHA GAKURE</h3>\r\n\r\n
           	<p>Halaman ini mendeskripsikan tempat fiksi yang disebutkan dalam&nbsp;anime&nbsp;dan&nbsp;manga&nbsp;<em>Naruto</em>. Negara-negara beroperasi sebagai wujud&nbsp;politik&nbsp;yang terpisah dan hampir semuanya adalah&nbsp;monarki, diatur oleh seorang tuan tanah yang memiliki kedudukan sejajar dengan pemimpin desa shinobi. Dunia Naruto mirip dengan&nbsp;feodal&nbsp;Jepang&nbsp;dalam bebrapa aspek; negara-negara tersebut menjaga keseimbangan di antara mereka melalui kekuatan. Perjanjian-perjanjian secara periodik ditandatangani, namun pada umumnya, perjanjian-perjanjian tidak berarti.Dalam&nbsp;manga&nbsp;<em>Naruto</em>, desa para shinobi (忍の里) atau desa-desa tersembunyi (隠れ里) adalah desa-desa ninja yang berperan sebagai kekuatan militer untuk negara mereka. Desa desa ini disebut desa tersembunyi karena berada jauh dari pusat peradaban negara tempat desa itu berada.&nbsp;</p>",

			'foto_tentang'      => 	"1-LImCAGCQx0jVgNv67IQj2GcktXGQagL",
			'tentang1'          => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus necessitatibus ipsum consequatur quia exercitationem facilis recusandae nihil, sequi tempore dignissimos voluptas dolor et, veniam laudantium facere, consectetur ipsam illo quisquam!",
			'visi'              => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi voluptates porro dolor natus excepturi ipsam quos provident magni amet quo. Placeat et veniam, necessitatibus ipsum voluptatem non reprehenderit recusandae cum.",
			'misi'              => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia doloribus ipsum repellat laboriosam ea aliquid, magnam nesciunt officia tempora aliquam! Consequatur, dolore autem cupiditate sed, eius ab voluptas pariatur id.",
			'tlp'               => "099999999999",
			'email'             => "admin@admin.com",
			'fb'                => "contoh",
			'twitter'           => "contoh",
			'ig'                => "contoh",
        ]);
    }
}
