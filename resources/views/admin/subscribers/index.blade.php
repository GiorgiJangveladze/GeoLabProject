@extends('layouts.admin')
@section('title','Subscribers')
@section('contnet')
	
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<h1>Subscribers list</h1>
		<table class="table table-bordered">
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Email</th> 
				<th>News</th>
				<th>Feature</th>
			</tr>
			@foreach($Subscribers as $Subscriber)
			<tr>
				<td>{{$Subscriber->id}}</td>
				<td>{{$Subscriber->name}}</td>
				<td>{{$Subscriber->email}}</td>
				<td>
				@foreach(unserialize($Subscriber->news) as $newsletter)
						<ul>
							<li>{{ $newsletter }}</li>
						</ul>
				@endforeach
				</td>
				<td>{{$Subscriber->created_at}}</td>
			@endforeach
		</tr>
		</table>

@show