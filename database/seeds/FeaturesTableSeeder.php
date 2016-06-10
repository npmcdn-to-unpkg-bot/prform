<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$features = [
						[
							'name'		=> 'Branding'
						],
						[
							'name'		=> 'Logo'
						],
						[
							'name'		=> 'Brand CI Guide'
						],
						[
							'name'		=> 'Social Media Management'
						],
						[
							'name'		=> 'Social Media Adds'
						],
						[
							'name'		=> 'SEO'
						],
						[
							'name'		=> 'Google Adds'
						],
						[
							'name'		=> 'Domain'
						],
						[
							'name'		=> 'Hosting'
						],
						[
							'name'		=> 'Copyright'
						],
						[
							'name'		=> 'Website Maintainance'
						],
						[
							'name'		=> 'Mobile Responsive'
						]
					];

		foreach ($features as $data)
		{
			DB::table('features')->insert(
									[
										'name' => $data['name']
									]);
		}
    }
}
