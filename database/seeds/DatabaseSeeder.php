<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Seeder data Role.
		$this->call(RoleSeeder::class);
		// Seeder data Root/Admin/User.
		$this->call(UserSeeder::class);
        //Seeder data permohonan KTP
        $this->call(KtpSeeder::class);
        //Seeder data Surat Kelahiran
        $this->call(SkkSeeder::class);
        //Seeder data SPTJM
        $this->call(SptjmSeeder::class);
        //Seeder data Pengunjugn website
        $this->call(PengunjungSeeder::class);
        //Seeder data Struktur
        $this->call(StrukturSeeder::class);
        //Seeder data Pengaduan
        $this->call(PengaduanSeeder::class);
        //Seeder data Surat tidak mampu
        $this->call(SktmSeeder::class);
        //Seeder data Surat kematian
        $this->call(SkematianSeeder::class);
        //Seeder data Surat keterangan
        $this->call(SkSeeder::class);
        //Seeder data Kategori blog
        $this->call(KategoriSeeder::class);
        //Seeder data Blog
        $this->call(BlogSeeder::class);
        //Seeder Pekerjaan
        $this->call(PekerjaanSeeder::class);
        //Seeder data Web
        $this->call(WebSeeder::class);

    }
}
