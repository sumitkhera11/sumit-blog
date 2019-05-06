@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class = "col-md-8">
				<table id = "datatable" class = "table table bordered table striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Detail</th>
							<th>Author</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class = "col-md-4">
				<form>
					<div class="form-group">
						<label>Id</label>
						<input type="number" id = "id" name="id" class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Name:</label>
						<input type="" id = "name" name="name" class="form-control">
					</div>

					<div class="form-group">
						<label>Detail</label>
						<textarea id = "detail" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" name="author" id = "author" class="form-control">
					</div>
					<button type = "button" id = "save" onclick ="savedata()" class = "btn btn-primary">Submit</button>
					<button type = "button" id = "update" onclick ="updatedata()" class = "btn btn-warning">Update</button>
				</form>	
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			// alert("hello single code");
			$("#datatable").DataTable();	
			viewdata();
		});

			function viewdata()
			{
				// alert("new alert called");	
				// console.log("new  console called");
				$.ajax({
					url:'/cruds',
					method: 'get',
					dataType: 'json',
					success:function(response) {	
						// var parsedJson = $.parseJSON(response);
						// alert(response);
						// console.log(parseJSON);

						// var obj = JSON.parse(response, function (key, value) {
  				// 			return value;
  				// 		});
  				// 		console.log(obj);


/*						$.each(response,function(key,value) {
								console.log(value);
						});*/
						// console.log(response);	
					},
					errors:function() {
						alert("error");
					}
				});
			}
	</script>
</body>
</html>

@endsection