<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;
use Illuminate\Support\Facades\Date;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user_id = 1;
    	for($i = 1; $i <= 30; $i++) {
    		DB::table('orders')->insert([
    				'code' => Str::random(10),
    				'start' => Date::yesterday(),
    				'end' => Date::tomorrow(),
    				'user_id' => $user_id,
    				//'book_id' => $i + 10,
    		]);
    		if($i == 5 || $i == 10 || $i == 15 || $i == 20 || $i == 25 || $i == 30) $user_id++;
    	}
    }
}
