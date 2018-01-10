<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServicesController extends Controller
{
    protected $Service;

    public function __construct()
    {
        $this->Service = new Service();
    }

    public function index()
    {

    	$services = $this->Service->get();
    	return view('admin.services.index',['services' => $services]);
    }
    public function addService()
    {
    	return view('admin.services.add');
    }
    public function addRequestService(Request $request)
    {
    	try
    	{
	    	$this->validate($request,[
	    		'title' => 'required|string|min:1|max:255',
	    		'img' 	=> 'required|image|mimes:svg|min:1|max:60' 
	    	]);

	    	$img = $request->file('img');
	    	$destination_path = 'gallery/services/';
	    	$imgname = str_random(6).'_'.$img->getClientOriginalName();
	    	$img->move($destination_path,$imgname);

	    	$service = $this->Service->create([
	    		'img' 	=> $destination_path.$imgname,
    			'title' => $request->input('title')
    		]);

    		if($service)
    		{
    			return redirect()->route('services')->with('success','service added');
    		}
    		return back()->with('error','service not added');	

    	}catch(ValidationException $ex)
    	{
    		\Log::error($ex->getMessage());
    		return back()->with('error',$ex->getMessage());	
    	}
    }

    public function editService($id)
    {
    	$Service = Service::find($id);
    	if(!$Service)
    	{
    		return abort(404); 
    	}
    	return view('admin.services.edit',['service' => $Service]);
    }
    public function editRequestService(Request $request,$id)
    {
    	try
    	{
    		$this->validate($request,[
	    		'title' => 'required|string|min:1|max:60',
	    		'img' 	=> 'required|image|mimes:svg|min:1|max:250' 
	    	]);

    		$service = Service::find($id);

    		if( $request->hasFile('img') )
    		{
               $this->deleteFile($service->img);

	           $img = $request->file('img');
	           $destination_path = 'gallery/services/';
	           $imgname = str_random(6).'_'.$img->getClientOriginalName();
	           $img->move($destination_path, $imgname);
	           $service->img = $destination_path . $imgname;
              
	     	 }
	     	   $service->title = $request->input('title');
		       $service->save();
    		if($service->save())
    		{
    			return redirect()->route('services')->with('success','service changed');
    		}
    		return back()->with('error','service not changed');		
    	}catch(ValidationExveption $ex)
    	{
    		\Log::error($ex->getMessage());
    		return back()->with('error',$ex->getMessage());	
    	}
    }
    public function deleteService(Request $request)
    {
    	if($request->ajax())
    	{
            $id = (int)$request->input('id');
            $service = $this->Service->find($id);
            $this->deleteFile($service->img);
            $this->Service->where('id',$id)->delete();
    	}
    }
}
