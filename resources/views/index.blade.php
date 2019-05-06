@extends('layouts.app')

@section('content')
<div class = "container">
@if($message = Session::get('success'))
	<div class = "alert alert-success">
		<center><strong>{{ $message }}</strong></center>
	</div>

@endif

<div class = "row">
	<div class="col-md-6">
		<h2>Crud Laravel </h2>
	</div>
	<div class="col-md-4">
		<form action = "{{url('/search') }}" method = "get">
			<div class = "form-group">
				<input type = "search" class = "form-control" name = "search">
				<span class = "form-group-btn">
					<button type = "submit" class="btn btn-primary">Search</button>
				</span>
			</div>
		</form>
	</div>
	<div class="col-md-2 text-right">
		<a href="{{ action('PostController@create') }}" class = "btn btn-success">Add Data</a>
	</div>
</div>
<form action = "{{ url('/deleteall') }}" method = "post">
	@csrf
	@method('DELETE')
<table class = "table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Detail</th>
			<th>Author</th>
			<th colspan="3">Action</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach($posts as $post)
			<tr>
				<td><input type = "checkbox" name = "ids[]" class = "selectbox" value = "{{ $post->id }}"/></td>
				<td>{{ $post->name }}</td>
				<td>{{ $post->detail }}</td>
				<td>{{ $post->author }}</td>

				<td>
					<form action = "{{ action('PostController@destroy',$post->id) }}" method = "post">
						<a href="{{ action('PostController@show',$post->id) }}" class="btn btn-info">Show</a>
						<a href="{{ action('PostController@edit',$post->id)}}" class="btn btn-warning">Edit</a>
						@csrf
						@method('DELETE')
						<button type = "submit" class = "btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<th><input type ="checkbox" class = "selectall2"/ ></th>
			<th>No</th>
			<th>Name</th>
			<th>Detail</th>
			<th>Author</th>
			<th colspan="3">Action</th>
		</tr>
	</tfoot>
</table>
</form>

{{ $post->links()  }}

<script type="text/javascript">
	$(document).ready(function() {
		$(".selectall2").click(function () {
			// alert("hello");
			
			$(".selectbox").prop('checked', $(this).prop('checked'));
			// $(".selectall2")
			// alert($(".selectbox").append($(this).prop("checked")));
			// var id = $("#")

		});	
	});
	
</script>
</div>
@endsection