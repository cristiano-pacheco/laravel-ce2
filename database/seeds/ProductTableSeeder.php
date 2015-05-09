<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use CodeCommerce\Product;


class ProductTableSeeder extends Seeder 
{

	public function run()
	{
        DB::table('products')->truncate();
        
        $faker = Faker::create();
        
        foreach ( range(1,30) as $i ) {
        
            Product::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' => $faker->randomFloat(2),
            ]);
        }
	}

}
