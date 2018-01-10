<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SliderController extends Controller
{
    protected $Slide;

    public function __construct()
    {
        $this->Slide = new Slide();
    }

    public function index()
    {
    	
    	$slides = $this->Slide->get();
    	return view('admin.slides.index',['slides' => $slides]);
    }

    public function addSlide()
    {
    	return view('admin.slides.add');
    }

    public function addRequestSlide(Request $request)
    {
    	try
    	{
	    	$this->validate($request,[
	    		'title' => 'required|string|min:4|max:255',
	    		'date' 	=> 'required|date|date_format:Y/m/d',
	    		'img' 	=> 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg' 
	    	]);


	    	$img = $request->file('img');
	    	$destination_path = 'gallery/slides/';
	    	$imgname = str_random(6).'_'.$img->getClientOriginalName();
	    	$img->move($destination_path,$imgname);

	    	$slide = $this->Slide->create([
	    		'img' 	=> $destination_path.$imgname,
	    		'date' 	=> $request->input('date'),
    			'title' => $request->input('title')
    		]);

    		if($slide)
    		{
    			return redirect()->route('slides')->with('success','slide added');
    		}
    		return back()->with('error','slide not added');	

    	}catch(ValidationException $ex)
    	{
    		\Log::error($ex->getMessage());
    		return back()->with('error',$ex->getMessage());	
    	}

    }

    public function editSlide($id)
    {
    	$slide = Slide::find($id);
    	if(!$slide)
    	{
    		return abort(404); 
    	}
    	return view('admin.slides.edit',['slide' => $slide]);
    }

    public function editRequestSlide(Request $request,$id)
    {
    	try
    	{
    		$this->validate($request,[
	    		'title' => 'required|string|min:4|max:255',
	    		'date' 	=> 'required|date|date_format:Y/m/d',
	    		'img' 	=> 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg' 
	    	]);

    		$slide = Slide::find($id);

    		if( $request->hasFile('img') )
    		{
               $this->deleteFile($slide->img);
               
	           $img = $request->file('img');
	           $destination_path = 'gallery/slides/';
	           $imgname = str_random(6).'_'.$img->getClientOriginalName();
	           $img->move($destination_path, $imgname);
	           $slide->img = $destination_path.$imgname;
	     	 }
	     	   $slide->title = $request->input('title');
		       $slide->date = $request->input('date');
               $slide->save();
    		if($slide->save())
    		{
    			return redirect()->route('slides')->with('success','slide changed');
    		}
    		return back()->with('error','slide not changed');		
    	}catch(ValidationExveption $ex)
    	{
    		\Log::error($ex->getMessage());
    		return back()->with('error',$ex->getMessage());	
    	}
    }

    public function deleteSlide(Request $request)
    {
    	if($request->ajax())
    	{
            $id = (int)$request->input('id');
            $slide = $this->Slide->find($id);
            $this->deleteFile($slide->img);

            $this->Slide->where('id',$id)->delete();
    	}
    }
}
