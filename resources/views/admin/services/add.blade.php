@extends('layouts.admin')
@section('title','add')
@section('contnet')
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<br>

		<div class="container">
	      <form class="form-signin" method="post" enctype="multipart/form-data">
	      	{!! csrf_field() !!}
	        <h2 class="form-signin-heading">Add Service:</h2>
	        
	        <label for="inputName" class="sr-only">Service Name</label>
	        <input type="text" name="title" id="inputName" class="form-control" placeholder="Service Name" required autofocus>
	      	@if ($errors->has('title'))
            <span class="help-block">
               <strong>{{ $errors->first('title') }}</strong>
            </span>
        	</br>
        	@endif
	        <label class="control-label" for="img">img</label>
        	<input class="form-control" id="img" name="img" type="file"/>
        	 @if ($errors->has('img'))
            <span class="help-block">
               <strong>{{ $errors->first('img') }}</strong>
            </span>
        	</br>
        	@endif
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
	      </form>
    </div>

	</main>
@show