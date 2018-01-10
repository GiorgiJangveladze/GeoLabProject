<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;

class SubscribersController extends Controller
{
    protected $Subscriber;

	public function __construct()
	{
		$this->Subscriber = new Subscriber();
	}

    public function index()
    {
    	$Subscribers = $this->Subscriber->whereNotNull('news')->get();
    	return view('admin.subscribers.index',['Subscribers' => $Subscribers]);
    }
}

