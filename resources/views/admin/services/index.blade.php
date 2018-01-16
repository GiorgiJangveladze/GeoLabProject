@extends('layouts.admin')
@section('title','Services')
@section('contnet')
	
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<h1>Services list</h1>
		<a href="{!! route('addService') !!}" class="btn btn-info">Add</a>
		<table class="table table-bordered">
			<tr>
				<th>id</th>
				<th>Title</th>
				<th>Img(route)</th>
				<th>Img</th>
				<th>Created</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach($services as $service)
			<tr>
				<td>{{$service->id}}</td>
				<td>{{$service->title}}</td>
				<td>{{$service->img}}</td>
				<td><img src="{{asset($service->img)}}" width="50px" height="50px" alt="img"></td>
				<td>{{$service->created_at}}</td>
				<td><a href="{!! route('editService',['id' => $service->id]) !!}">Edit</a></td>
				<td><a href="javascript:;" class="Delete" rel="{{$service->id}}" >Delete</a></td>
			</tr>
			@endforeach
		</table>
		
@show
@section('js')
	<script type="text/javascript">
		$(function()
		{
			$(".Delete").on('click',function()
			{
				if(confirm("delete?"))
				{
					let id = $(this).attr("rel");
					$.ajax({
						type: "delete",
						url: "{!! route('serviceDelete') !!}",
						data: {_token:"{{ csrf_token()}}",id:id},
						complete:function()
						{
							alert("service deleted");
							location.reload();
						}
					});
				}
			});
		});
	</script>
@show