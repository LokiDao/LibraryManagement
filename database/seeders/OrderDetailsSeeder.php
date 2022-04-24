<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    	$id = 1;
    	for ($order_id = 1; $order_id <= 30; $order_id++) {
    		if($order_id == 1
    				|| $order_id == 5
    				|| $order_id == 10
    				|| $order_id == 15
    				|| $order_id == 20
    				|| $order_id == 25
    				|| $order_id == 30
    				) {
    			DB::table('order_details')->insert([
    				'code' => Str::random(10),
    				'order_id' => $order_id,
    				'book_id' => $id,
    			]);
    			$id++;
    		}
	    	for($book_id = 1; $book_id <= 50; $book_id++) {
	    		DB::table('order_details')->insert([
	    				'code' => Str::random(10),
	    				'order_id' => $order_id,
	    				'book_id' => $book_id,
	    		]);
	    	}
    	}
    }
}
