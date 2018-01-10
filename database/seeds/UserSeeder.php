<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	       User::create(
	       [
	       	'name'=>'admin',
	      	'email'=>'admin@gmail.com',
	      	'password'=>'$10$AtnCJw6RWWG/r4W9u7G3H.K9rslGPbBLbwc5QZ/uNmTP2o8IJ5MoK',
	      	'isAdmin'=>true,
	      	'remember_token'=>'OOxUgdTuRG6brHsYE3krtFxuzNTdesJZDBOlouDDhQ2VBGz4HVfncsh1hEhe'
	       ]);
	    }
}
