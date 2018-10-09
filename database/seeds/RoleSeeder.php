<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
    	$role_employee->name = 'User';
    	$role_employee->deskripsi = 'Masyarakat';
    	$role_employee->save();

    	$role_manager = new Role();
    	$role_manager->name = 'Admin';
    	$role_manager->deskripsi = 'Admin Sistem';
    	$role_manager->save();

    	$role_manager = new Role();
    	$role_manager->name = 'Kepala Desa';
    	$role_manager->deskripsi = 'Kepala Desa';
    	$role_manager->save();
    }
}
