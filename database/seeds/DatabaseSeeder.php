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
        //Seeder data Surat Pengantar Pindah
        $this->call(SppSeeder::class);
        //Seeder data permohonan KTP
        $this->call(KtpSeeder::class);
        //Seeder data Surat Kelahiran
        $this->call(SkkSeeder::class);
        //Seeder data SPTJM
        $this->call(SptjmSeeder::class);

    }
}
