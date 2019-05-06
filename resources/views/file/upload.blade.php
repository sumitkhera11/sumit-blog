@extends('layouts.app')

@section('content')
	<div class = "container">

@if($message = Session::get('success'))
	<div class = "alert alert-success">
		<center><strong>{{ $message }}</strong></center>
	</div>
@endif 
		<div class="row">
			<div class="col-md-6 col-offset-md-4">
				<div class="card">
					<h5 class = "card-header alert alert-success">File Upload</h5>
					<div class="card-body">
						<form action ="{{ route('uploadfile') }}" method = "post" enctype = "multipart/form-data">
							@csrf
							<div class = "form-group">
								<input type = "file" name = "file[]" multiple>
							</div>
							<button type = "submit" class = "btn btn-primary">Upload</button>
							<a href = "{{ route('viewfile') }}" class = "btn btn-primary">Back</a>
						</form>
					</div>
			</div>
		</div>

	</div>
@endsection



