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
        // Eeder data Role.
		$this->call(RoleSeeder::class);
		// Seeder data Root/Admin/User.
		$this->call(UserSeeder::class);
    }
}
