<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->truncate();

    	$data = [
    		[
    			'name' => 'admin',
    			'created_at' => Carbon::now()
    		],
    		[
    			'name' => 'worker',
    			'created_at' => Carbon::now()
    		],
    		[
    			'name' => 'employer',
    			'created_at' => Carbon::now()
    		]
    	];

    	DB::table('roles')->insert($data);
    }
}
