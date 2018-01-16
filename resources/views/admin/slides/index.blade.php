@extends('layouts.admin')
@section('title','Slides')
@section('contnet')
	
	<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<h1>Slides list</h1>
		<a href="{!! route('slidesAdd') !!}" class="btn btn-info">Add</a>
		<table class="table table-bordered">
			<tr>
				<th>id</th>
				<th>Img(route)</th>
				<th>Img</th>
				<th>Date</th>
				<th>Title</th>
				<th>Created</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach($slides as $slide)
			<tr>
				<td>{{$slide->id}}</td>
				<td>{{$slide->img}}</td>
				<td><img src="{{asset($slide->img)}}" width="50px" height="50px" alt="img"></td>
				<td>{{$slide->date}}</td>
				<td>{{$slide->title}}</td>
				<td>{{$slide->created_at}}</td>
				<td><a href="{!! route('editSlide',['id' => $slide->id]) !!}">Edit</a></td>
				<td><a href="javascript:;" class="Delete" rel="{{$slide->id}}" >Delete</a></td>
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
						url: "{!! route('slideDelete') !!}",
						data: {_token:"{{ csrf_token()}}",id:id},
						complete:function()
						{
							alert("slide deleted");
							location.reload();
						}
					});
				}
			});
		});
	</script>
@show