@extends('layouts.admin')
@section('title','Social Links')
@section('contnet')
	
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<h1>Social links list</h1>
		<a href="{!! route('addSocial_link') !!}" class="btn btn-info">Add</a>
		<table class="table table-bordered">
			<tr>
				<th>id</th>
				<th>Icon(route)</th>
				<th>Icon</th>
				<th>Link</th>
				<th>Edit</th>
			</tr>
			@foreach($socialLinks as $socialLink)
			<tr>
				<td>{{$socialLink->id}}</td>
				<td>{{$socialLink->icon}}</td>
				<td><img src="{{asset($socialLink->icon)}}" width="50px" height="50px" alt="icon"></td>
				<td>{{$socialLink->link}}</td>
				<td><a href="{!! route('editSocial_link',['id' => $socialLink->id]) !!}">Edit</a></td>
			</tr>
			@endforeach
		</table>

@show