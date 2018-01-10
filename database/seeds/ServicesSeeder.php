<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('services')->insert(
        	[
        		[
        			'title'=>'MODIFY',
        			'img'=>'gallery/services/modify.svg'
        		],
        		[
        			'title'=>'BUY',
        			'img'=>'gallery/services/buy.svg'
        		],
        		[
        			'title'=>'REPAIR',
        			'img'=>'gallery/services/repair.svg'
        		]
        	]
        );
    }
}
