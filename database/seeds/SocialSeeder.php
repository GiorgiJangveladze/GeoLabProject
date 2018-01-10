<?php

use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('sociallinks')->insert(
        	[
        		[
        			'icon'=>'gallery/social/google.svg',
        			'link'=>'https://plus.google.com'
        		],
        		[
        			'icon'=>'gallery/social/fb.svg',
        			'link'=>'https://facebook.com'
        		],
        		[
        			'icon'=>'gallery/social/twitter.svg',
        			'link'=>'https://twitter.com'
        		]
        	]
        );
    }
}
