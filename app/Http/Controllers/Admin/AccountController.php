<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;
use App\Service;

class AccountController extends Controller
{
	protected $Service;
	protected $Subscriber;

	public function __construct()
	{
		$this->Service = new Service();
		$this->Subscriber = new Subscriber();
	}

   	public function index()
   	{
   		$services 	 = $this->Service    ->count();
   		$subscribers = $this->Subscriber ->whereNotNull('news')->get();
   		$count = count($subscribers);
   		$recive = $this->news($subscribers);
   		return view('admin.index',['services' => $services,'subscribers' => $subscribers,'countSub' => $count,'recive' => $recive]);
   	}

   	public function news($subscribers)
   	{
   		$images = 0;
   		$promotions =0;
   		$updates = 0;
   		$joboffers = 0;

   		foreach ($subscribers as $subscriber) {
   			foreach(unserialize($subscriber->news) as $newsletter)
   			{
   				if($newsletter == 'image')$images++;
   				if($newsletter == 'promotions')$promotions++;
   				if($newsletter == 'updates')$updates++;
   				if($newsletter == 'image') $joboffers++;

   			}
   		}
   		return ['images' => $images,'promotions' => $promotions,'updates' =>$updates,'joboffers' => $joboffers];
   	}

      public function logout()
      {
         \Auth::logout();
         return redirect(route('login'));
      }
}
