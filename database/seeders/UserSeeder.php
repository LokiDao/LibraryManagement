<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Str;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i = 1; $i <= 10; $i++) {
	        DB::table('users')->insert([
	        	'name' => Str::random(10),
	        	'email' => Str::random(10).'@gmail.com',
	        	'password' => Str::random(10),
	        ]);
    	}
    }
}
