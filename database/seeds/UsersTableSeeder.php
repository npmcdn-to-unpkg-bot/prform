<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
					[
						'full_name'		=> 'cms',
						'user_name'		=> 'cms',
						'email'			=> 'cms@gmail.com',
						'password'		=> bcrypt('1234'),
						'user_type'		=> 'super_admin',
						'is_enabled'	=> 'enabled'
					],
					[
						'full_name'		=> 'Michael',
						'user_name'		=> 'michael',
						'email'			=> 'michael@gmail.com',
						'password'		=> bcrypt('1234'),
						'user_type' 	=> 'admin',
						'is_enabled'	=> 'enabled'
					],
					[
						'full_name'		=> 'Ailene',
						'user_name'		=> 'ailene',
						'email'			=> 'ailene@gmail.com',
						'password'		=> bcrypt('1234'),
						'user_type'		=> 'admin',
						'is_enabled'	=> 'enabled'
					],
					[
						'full_name'		=> 'Vincent',
						'user_name'		=> 'vincent',
						'email'			=> 'vincent@gmail.com',
						'password'		=> bcrypt('1234'),
						'user_type'		=> 'admin',
						'is_enabled'	=> 'enabled'
					],
					[
						'full_name'		=> 'Abrar Jahin',
						'user_name'		=> 'abrarjahin',
						'email'			=> 'abrarjahin@gmail.com',
						'password'		=> bcrypt('1234'),
						'user_type'		=> 'normal_user',
						'is_enabled'	=> 'enabled'
					],
					[
						'full_name'		=> 'Mazanur Rahman',
						'user_name'		=> 'mizan',
						'email'			=> 'mizan@gmail.com',
						'password'		=> bcrypt('1234'),
						'user_type'		=> 'normal_user',
						'is_enabled'	=> 'enabled'
					],
					[
						'full_name'		=> 'Piash',
						'user_name'		=> 'piash',
						'email'			=> 'piash@gmail.com',
						'password'		=> bcrypt('1234'),
						'user_type'		=> 'normal_user',
						'is_enabled'	=> 'disabled'
					]
				];

        foreach ($users as $user)
        {
			DB::table('users')->insert(
									[
										'full_name' => $user['full_name'],
										'user_name' => $user['user_name'],
										'email'		=> $user['email'],
										'password'	=> $user['password'],
										'user_type'	=> $user['user_type'],
										'is_enabled'=> $user['is_enabled']
									]);
        }
    }
}
