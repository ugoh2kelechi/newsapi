<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class VehiclesSeed extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		
		for($i=0; $i < 30; $i++)
		{
			DB::table('vehicles')->insert([
				'color' => $faker->safeColorName,
				'power' => $faker->randomNumber(6),
				'capacity' => $faker->randomFloat,
				'speed' => $faker->randomFloat,
				'maker_id' => $faker->numberBetween(1,6)
			]);
		}
	}

}
