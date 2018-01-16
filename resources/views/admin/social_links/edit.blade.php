@extends('layouts.admin')
@section('title','edit')
@section('contnet')
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<br>

		<div class="container">
	      <form class="form-signin" method="post" enctype="multipart/form-data">
	      	{!! csrf_field() !!}
	        <h2 class="form-signin-heading">Edit Social link:</h2>
	        
	        <label for="inputName" class="sr-only">Link</label>
	        <input type="text" name="link" id="inputName" class="form-control" placeholder="Link" value="{{ $social_link->link }}" required autofocus>
	    	 @if ($errors->has('link'))
            <span class="help-block">
               <strong>{{ $errors->first('link') }}</strong>
            </span>
        	</br>
        	@endif
        	<label class="control-label" for="img">icon ( if you do not choose the icon it remains old )</label>
        	<input class="form-control" id="img" name="icon" type="file"/>
        	 @if ($errors->has('icon'))
            <span class="help-block">
               <strong>{{ $errors->first('icon') }}</strong>
            </span>
        	</br>
        	@endif
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Edit</button>
	      </form>
    </div>

	</main>
@show