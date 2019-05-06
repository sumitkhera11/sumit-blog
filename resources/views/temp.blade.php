$("#datatable").DataTable();	
		$('#save').show();
		$('#update').hide();

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')

			}
		});

$(document).ready(function() {
	viewdata();
});
		function viewdata()
		{	
			alert("alert printing");
			console.log('console printing');
			/*$.ajax({
				url:'/cruds',
				type:'GET',
				dataType:"json",
				
				success:function(response) {
					// var rows = '';
					console.log("console");
					$.each(response.data, function(key,value) {
						rows = "<tr>";
						rows .= "<td>" . value.id . "</td>";
						rows .= "<td>" . value.name . "</td>";
						rows .= "<td>" . value.author . "</td>";
						rows .= "<td>" . value.detail . "</td>";
						rows .= "<td>" . value.author . "</td>";
						rows .= "</tr>";
						console.log(key);
					});
					// alert("hello");
					$('tbody').html("hello345");		
					// alert("datatable");
				},
				errors:function() {
					alert("error in loading datatable");
				}
			});*/
		}
		function savedata()
		{

		}
		function cleardata()
		{
			$("#id").val('');
			$("#name").val('');
			$("#detail").val('');
			$("#author").val('');
		}
		function editdata()
		{

		}	
		function updatedata()
		{

		}