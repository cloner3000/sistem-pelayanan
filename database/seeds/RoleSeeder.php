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
    	$role_manager->name = 'Sekretaris Desa';
    	$role_manager->deskripsi = 'Sekretaris Desa';
    	$role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Urusan Administrasi Umum';
        $role_manager->deskripsi = 'Kepala Urusan Administrasi Umum';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Urusan Keuangan';
        $role_manager->deskripsi = 'Kepala Urusan Keuangan';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Urusan Perencanaan';
        $role_manager->deskripsi = 'Kepala Urusan Perencanaan';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Seksi Pelayanan';
        $role_manager->deskripsi = 'Kepala Seksi Pelayanan';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Seksi Pemerintahan';
        $role_manager->deskripsi = 'Kepala Seksi Pemerintahan';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Seksi Kesejahteraan';
        $role_manager->deskripsi = 'Kepala Seksi Kesejahteraan';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Dusun Malinggut I';
        $role_manager->deskripsi = 'Kepala Dusun Malinggut I';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Dusun Malinggut II';
        $role_manager->deskripsi = 'Kepala Dusun Malinggut II';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Dusun Malinggut III';
        $role_manager->deskripsi = 'Kepala Dusun Malinggut III';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'Kepala Dusun Sukamaju';
        $role_manager->deskripsi = 'Kepala Dusun Sukamaju';
        $role_manager->save();

    	$role_manager = new Role();
    	$role_manager->name = 'Kepala Desa';
    	$role_manager->deskripsi = 'Kepala Desa';
    	$role_manager->save();
    }
}
