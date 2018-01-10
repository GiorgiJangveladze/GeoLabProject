<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Slide;
use App\Service;
use App\Sociallink;

class HomeController extends Controller
{
	protected $Subscriber;
    protected $Slide;
    protected $Service;
    protected $Sociallink;


	public function __construct()
	{
		$this->Subscriber = new Subscriber();
        $this->Slide      = new Slide();
        $this->Service    = new Service();
        $this->Sociallink = new Sociallink();
	}

    public function index()
    {
        $services    = $this->Service->get();
        $slides      = $this->Slide->get();
        $sociallinks = $this->Sociallink->get(); 
    	return view('index',['services' => $services,'slides' => $slides,'sociallinks' => $sociallinks]);
    }

    public function subscriberRequest(Request $request)
    {
    	
    	try
    	{
	    	$this->validate($request,[
	    	'name'    		=> 'required|string|min:2|max:40|unique:subscribers',
            'email'   		=> 'required|string|email|max:255|unique:subscribers',
            'subject' 		=> 'required|string|min:1|max:255',
            'description'   => 'required|string|min:1',
            'gender'  		=> 'required'
	    	]);
	    	if($request->has('newsletters'))
	    	{
	    		$news = serialize($request->input('newsletters'));
	    	}else $news =null;
            
	    	$Subscriber = $this->Subscriber->create([
	    		'name' 		  => $request->input('name'), 
	    		'email' 	  => $request->input('email'),
    			'subject'	  => $request->input('subject'),
    			'description' => $request->input('description'),
    			'gender'      => $request->input('gender'),
    			'news'		  => $news
     		]);

    		if($Subscriber)
    		{
    			return back()->with('success','Subscriber added');
    		}
    		return back()->with('error','Subscriber not added');	

    	}catch(ValidationException $ex)
    	{
    		\Log::error($ex->getMessage());
    		return back()->with('errors',$ex->getMessage());	
    	}
    }

}
