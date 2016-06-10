<?php

use Illuminate\Database\Seeder;

class ProjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$project_types = [
							[
								'name'		=> 'Corporate'
							],
							[
								'name'		=> 'Ecommerce'
							],
							[
								'name'		=> 'Portal'
							]
						];

		foreach ($project_types as $data)
		{
			DB::table('project_types')->insert(
									[
										'name' => $data['name']
									]);
		}
    }
}
