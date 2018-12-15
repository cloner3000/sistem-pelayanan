<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$role_root          = Role::where('name', 'Kepala Desa')->first();
		
		$role_sekdes        = Role::where('name', 'Sekretaris Desa')->first();
		$role_administrasi  = Role::where('name', 'Kepala Urusan Administrasi Umum')->first();
		$role_keuangan      = Role::where('name', 'Kepala Urusan Keuangan')->first();
		$role_rencana       = Role::where('name', 'Kepala Urusan Perencanaan')->first();
		$role_pelayanan     = Role::where('name', 'Kepala Seksi Pelayanan')->first();
		$role_pemerintahan  = Role::where('name', 'Kepala Seksi Pemerintahan')->first();
		$role_kesejahteraan = Role::where('name', 'Kepala Seksi Kesejahteraan')->first();
		$role_malinggut1    = Role::where('name', 'Kepala Dusun Malinggut I')->first();
		$role_malinggut2    = Role::where('name', 'Kepala Dusun Malinggut II')->first();
		$role_malinggut3    = Role::where('name', 'Kepala Dusun Malinggut III')->first();
		$role_malinggut4    = Role::where('name', 'Kepala Dusun Malinggut IV')->first();
		$role_sukamaju      = Role::where('name', 'Kepala Dusun Sukamaju')->first();
		
		$role_user          = Role::where('name', 'User')->first();

	    $superAdmin = new User();
	    $superAdmin->name = 'Hilmi Nurhikmat';
	    $superAdmin->email = 'hilmi@kades.com';
	    $superAdmin->password = bcrypt('admin123');
	    $superAdmin->save();
	    $superAdmin->roles()->attach($role_root);

	    $Admin1 = new User();
	    $Admin1->name = 'Beni Lesmana, S.IP';
	    $Admin1->email = 'beni@admin.com';
	    $Admin1->password = bcrypt('admin123');
	    $Admin1->save();
	    $Admin1->roles()->attach($role_sekdes);

	    $Admin2 = new User();
	    $Admin2->name = 'Cici Endas Rahmatika, A.Md';
	    $Admin2->email = 'cici@admin.com';
	    $Admin2->password = bcrypt('admin123');
	    $Admin2->save();
	    $Admin2->roles()->attach($role_administrasi);

	    $Admin3 = new User();
	    $Admin3->name = 'Hastiti Tresna Ayu';
	    $Admin3->email = 'hastiti@admin.com';
	    $Admin3->password = bcrypt('admin123');
	    $Admin3->save();
	    $Admin3->roles()->attach($role_keuangan);

	    $Admin4 = new User();
	    $Admin4->name = 'Fahmi pamungkas';
	    $Admin4->email = 'fahmi@admin.com';
	    $Admin4->password = bcrypt('admin123');
	    $Admin4->save();
	    $Admin4->roles()->attach($role_rencana);

	    $Admin5 = new User();
	    $Admin5->name = 'Dede Abdillah, S.HI';
	    $Admin5->email = 'dede@admin.com';
	    $Admin5->password = bcrypt('admin123');
	    $Admin5->save();
	    $Admin5->roles()->attach($role_pelayanan);

	    $Admin6 = new User();
	    $Admin6->name = 'Handry Sulistyio H';
	    $Admin6->email = 'handry@admin.com';
	    $Admin6->password = bcrypt('admin123');
	    $Admin6->save();
	    $Admin6->roles()->attach($role_pemerintahan);

	    $Admin7 = new User();
	    $Admin7->name = 'Ahmad Nurzaman';
	    $Admin7->email = 'ahmad@admin.com';
	    $Admin7->password = bcrypt('admin123');
	    $Admin7->save();
	    $Admin7->roles()->attach($role_kesejahteraan);

	    $Admin8 = new User();
	    $Admin8->name = 'Iwan R. Maulana';
	    $Admin8->email = 'iwan@admin.com';
	    $Admin8->password = bcrypt('admin123');
	    $Admin8->save();
	    $Admin8->roles()->attach($role_malinggut1);

	    $Admin9 = new User();
	    $Admin9->name = 'Dudin Saepudin';
	    $Admin9->email = 'dudin@admin.com';
	    $Admin9->password = bcrypt('admin123');
	    $Admin9->save();
	    $Admin9->roles()->attach($role_malinggut2);

	    $Admin10 = new User();
	    $Admin10->name = 'Isep Saepul Rohman';
	    $Admin10->email = 'isep@admin.com';
	    $Admin10->password = bcrypt('admin123');
	    $Admin10->save();
	    $Admin10->roles()->attach($role_malinggut3);

	    $Admin11 = new User();
	    $Admin11->name = 'kadus 4';
	    $Admin11->email = 'kadus4@admin.com';
	    $Admin11->password = bcrypt('admin123');
	    $Admin11->save();
	    $Admin11->roles()->attach($role_malinggut4);

	    $Admin12 = new User();
	    $Admin12->name = 'Kamal Chairil';
	    $Admin12->email = 'kamal@admin.com';
	    $Admin12->password = bcrypt('admin123');
	    $Admin12->save();
	    $Admin12->roles()->attach($role_sukamaju);

	    $User = new User();
	    $User->name = 'User';
	    $User->email = 'user@user.com';
	    $User->password = bcrypt('user123');
	    $User->save();
	    $User->roles()->attach($role_user);
    }
}
