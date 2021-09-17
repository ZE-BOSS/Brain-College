<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Model\admin;

class AdminsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
	        'name'     => 'Obi Christopher',
	        'phoneno1'     => '2348105892905',
	        'username' => 'Zeboss',
	        'address' => '',
	        'country' => 'Nigeria',
	        'state' => 'Lagos',
	        'zipcode' => '',
	        'email'    => 'ikchristo19@gmail.com',
	        'password' => Hash::make('SAVAGEjasper@12345'),
	        'category'     => 'Super Admin',
	        'position'     => 'CEO',
	        'remember_token' => rand(11111, 99999),
	        'time' => '12:00 AM',
	        'd' => '25',
	        'm' => '4',
	        'y' => '2020',
	        'status' => 'Active',
	    ]);
    }
}
