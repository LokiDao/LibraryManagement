<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 1; $i <= 100; $i++) {
	        DB::table('books')->insert([
	        	'code' => Str::random(6),
	        	'name' => Str::random(20),
	        ]);
    	}
    }
}
