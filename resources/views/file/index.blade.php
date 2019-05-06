@extends('layouts.app')

@section('content')
	<div class="container">
@if($message = Session::get('success'))
	<div class = "alert alert-success">
		<center><strong>{{ $message }}</strong></center>
	</div>
@endif 
		<p>
			<a href = "{{ route('formfile') }}" class =  "btn btn-primary">Upload File</a>
		</p>
		<div class="row">
			@foreach($files as $file)
			<div class="col-md-4">
				<div class="card">
					<img class = "card-img-top" src= "{{ Storage::url($file->path)  }}">
					<div class="card-body">
						<strong class="card-title">{{ $file->title }}</strong>
						<p class="card-text">{{ $file->created_at->diffforHumans() }}</p>
						<form action="{{ route('deletefile', $file->id) }}" method="post">
							@csrf
							@method('DELETE')
							<button type = "submit" class="btn btn-danger">Delete</button>
							<a class="btn btn-primary" href="{{ route('downloadfile',$file->id) }}">Download</a>
							<a href="{{ route('emailfile', $file->id) }}" class="btn btn-success">Email</a>
						</form>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		{{ $files->links() }}
	</div>
@endsection