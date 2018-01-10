<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sociallink;

class SocialLinksController extends Controller
{
	protected $Social;

	public function __construct()
	{
		$this->Social = new Sociallink();
	}

	public function index()
	{
    	$socials = $this->Social->get();
    	return view('admin.social_links.index',['socialLinks' => $socials]);
	}

	public function addSocial_link()
	{
		return view('admin.social_links.add');
	}   

	public function addRequestSocial_link(Request $request)
	{
		try
    	{
	    	$this->validate($request,[
	    		'link' => 'required|string|min:8|max:255',
	    		'icon' 	=> 'required|image|mimes:jpeg,png,jpg,svg|max:250'
	    	]);


	    	$icon = $request->file('icon');
	    	$destination_path = 'gallery/social/';
	    	$iconname = str_random(6).'_'.$icon->getClientOriginalName();
	    	$icon->move($destination_path,$iconname);

	    	$social_link = $this->Social->create([
	    		'icon' 	=> $destination_path.$iconname,
    			'link' => $request->input('link')
    		]);

    		if($social_link)
    		{
    			return redirect()->route('social_links')->with('success','Social link added');
    		}
    		return back()->with('error','Social link not added');	

    	}catch(ValidationException $ex)
    	{
    		\Log::error($ex->getMessage());
    		return back()->with('error',$ex->getMessage());	
    	}
	}

	public function editSocial_link($id)
	{
		$social_link = $this->Social ->find($id);
		return view('admin.social_links.edit',['social_link' => $social_link]);	
	}    

	public function editRequestSocial_link(Request $request,$id)
	{

    	try
    	{
    		$this->validate($request,[
	    		'link' => 'required|string|min:8|max:255',
	    		'icon' 	=> 'image|mimes:jpeg,png,jpg,svg|max:250'
	    	]);

    		$social_link = Sociallink::find($id);

    		if( $request->hasFile('icon'))
    		{
    		   $this->deleteFile($social_link->icon);
                
	           $icon = $request->file('icon');
	           $destination_path = 'gallery/social/';
	           $iconname = str_random(6).'_'.$icon->getClientOriginalName();
	           $icon->move($destination_path, $iconname);
	           $social_link->icon = $destination_path . $iconname;

	     	 }
	     	   $social_link->link = $request->input('link');
	     	   $social_link->save();
    		if($social_link->save())
    		{
    			return redirect()->route('social_links')->with('success','Social link changed');
    		}
    		return back()->with('error','Social link changed');		
    	}catch(ValidationExveption $ex)
    	{
    		\Log::error($ex->getMessage());
    		return back()->with('error',$ex->getMessage());	
    	}
	}
}
