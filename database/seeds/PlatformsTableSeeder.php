<?php

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$platforms = [
						[
							'name'		=> 'WP'
						],
						[
							'name'		=> 'Magento'
						]
					];

		foreach ($platforms as $data)
		{
			DB::table('platforms')->insert(
									[
										'name' => $data['name']
									]);
		}
    }
}
