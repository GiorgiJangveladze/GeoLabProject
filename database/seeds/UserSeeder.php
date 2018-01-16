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
	      	'password'=>'$2y$10$yLWaNC0vfIQMXOi20RGgnus4ujnHmTxm/P2X8ykEmO0vI3B4wUgLS',
	      	'isAdmin'=>true
	       ]);
	    }
}
