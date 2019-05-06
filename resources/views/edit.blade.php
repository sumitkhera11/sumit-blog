@extends('layouts.app')

@section('content')
<div class = "container">
<div class = "row">
	<div class = "col-md-6 offset-md-3">
		@if($errors->any())
			<div class = "alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		@endif

		@foreach($posts as $post)
			<form action = "{{  route('posts.update',$post->id) }}" method = "post">
				@csrf
				@method('PUT')
				<div class = "form-group">
					<label></label>
					<input type = "text" name = "name" class = "form-control" value= "{{ $post->name   }}">
				</div>
				<div class = "form-group">
					<label></label>
					<input type = "text" name = "detail" class = "form-control" value= "{{ $post->detail   }}">
				</div>
				<div class = "form-group">
					<label></label>
					<input type = "text" name = "author" class = "form-control" value= "{{ $post->author   }}">
				</div>
				<button type = "submit" class = "btn btn-warning">Update</button>
				<a href="{{ route('posts.index') }}" class = "btn btn-default">Back</a>
			</form>
		@endforeach

	</div>



</div>
</div>



@endsection