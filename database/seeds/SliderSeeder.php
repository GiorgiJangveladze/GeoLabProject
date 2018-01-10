<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('slider')->insert(
        	[
        		[
        			'img'=>'gallery/slides/1_car.svg',
        			'date'=>'2017-01-06',
        			'title'=>'Vintage Auto Exhibition'
        		],
        		[
        			'img'=>'gallery/slides/2_car.svg',
        			'date'=>'2017-01-07',
        			'title'=>'Seconde title'
        		]
        	]
        );
    }
}
