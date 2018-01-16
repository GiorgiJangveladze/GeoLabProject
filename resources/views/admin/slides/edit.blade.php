@extends('layouts.admin')
@section('title','edit')
@section('contnet')
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<br>

		<div class="container">
	      <form class="form-signin" method="post" enctype="multipart/form-data">
	      	{!! csrf_field() !!}
	        <h2 class="form-signin-heading">Edit Slide:</h2>
	        
	        <label for="inputName" class="sr-only">Title</label>
	        <input type="text" name="title" id="inputName" class="form-control" value="{{ $slide->title }}" placeholder="Title" required autofocus>
	         @if ($errors->has('title'))
            <span class="help-block">
               <strong>{{ $errors->first('title') }}</strong>
            </span>
        	</br>
        	@endif
	      	<label class="control-label" for="date">Date</label>
        	<input class="form-control" id="date" name="date" placeholder="YYY/MM/DD" value="{{ str_replace('-','/',$slide->date) }}" type="text"/>
        	@if ($errors->has('date'))
            <span class="help-block">
               <strong>{{ $errors->first('date') }}</strong>
            </span>
        	@endif
        	</br>
        	<label class="control-label" for="img">img ( if you do not choose the image it remains old )</label>
        	<input class="form-control" id="img" name="img" type="file" />
        	@if ($errors->has('img'))
            <span class="help-block">
               <strong>{{ $errors->first('img') }}</strong>
            </span>
        	@endif
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
	      </form>
    	</div>

	</main>
@show