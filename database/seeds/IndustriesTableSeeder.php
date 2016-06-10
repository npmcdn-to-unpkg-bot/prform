<?php

use Illuminate\Database\Seeder;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
						[
							'name'		=> 'Google'
						],
						[
							'name'		=> 'Facebook'
						],
						[
							'name'		=> 'Twitter'
						],
						[
							'name'		=> 'Apple'
						],
						[
							'name'		=> 'Toyota'
						],
						[
							'name'		=> 'Bp'
						],
						[
							'name'		=> 'Alibaba'
						],
						[
							'name'		=> 'Amazon'
						],
						[
							'name'		=> 'E-Bay'
						]
					];

		foreach ($industries as $data)
		{
			DB::table('industries')->insert(
									[
										'name' => $data['name']
									]);
		}
    }
}
