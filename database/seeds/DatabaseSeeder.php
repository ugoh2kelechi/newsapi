<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		/*
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		DB::table('makers')->delete();
		DB::table('vehicles')->delete();

		$this->call('MakerSeed');
		$this->call('VehiclesSeed');

		*/

		Model::unguard();

		Model::reguard();
	}

	

}
