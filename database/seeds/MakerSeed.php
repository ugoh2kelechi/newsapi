<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class MakerSeed extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = Faker::create();
		
		for($i=0; $i < 6; $i++)
		{
			DB::table('makers')->insert([
				'name' => $faker->name,
				'phone' => $faker->randomNumber(9)
			]);
		}
	}

}
