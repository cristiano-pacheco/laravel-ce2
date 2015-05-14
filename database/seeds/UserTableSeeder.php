<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('users')->truncate();
        
        User::create([
            'name' => 'Chris',
            'email' => 'chris.spb25@gmail.com',
            'password' => \Hash::make('123'),
        ]);
        
        $faker = Faker::create();
       
        foreach ( range(1,30) as $i) {
        
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => \Hash::make('123'),
            ]);
        }
	}

}
