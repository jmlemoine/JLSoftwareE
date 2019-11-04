@extends('master')

@section('content')

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


	<div class="row">
		<div class="col-md-12">
			<br />
			<br />
			<h1 align="center">Student Data</h1>
			<br />
			@if($message = Session::get('success')) 
			<div class="alert alert-success">
				<p>{{$message}}</p>
			</div>
			@endif
			<div align="right">
				<a href="{{route('student.create')}}" class="btn btn-primary">Add Student</a>
			</div>
			<br />
			<table id="student_table" class="table table-bordered" style="width:100%">
				<thead>
                                        <tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>

				</thead>

				<tbody>
								@foreach($students as $row)
									<tr>
										<td>{{$row['first_name']}}</td>
										<td>{{$row['last_name']}}</td>
										<td><a href="{{action('StudentController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
										<td>
											<form method="post" class="delete_form" action="{{action('StudentController@destroy', $row['id'])}}">
											{{csrf_field()}}
											<input type="hidden" name="_method" value="DELETE" />
											<button type="submit" class="btn btn-danger">Delete</button>
											</form>
										</td>
									</tr>
								@endforeach

				</tbody>
			</table>
			<!--<table id="student_table" class="table table-bordered" style="width:100%">
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach($students as $row)
					<tr>
						<td>{{$row['first_name']}}</td>
						<td>{{$row['last_name']}}</td>
						<td><a href="{{action('StudentController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
						<td>
							<form method="post" class="delete_form" action="{{action('StudentController@destroy', $row['id'])}}">
							{{csrf_field()}}
							<input type="hidden" name="_method" value="DELETE" />
							<button type="submit" class="btn btn-danger">Delete</button>
							</form>
    					</td>
					</tr>
				@endforeach
			</table>-->
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
		$('.delete_form').on('submit', function(){
		if(confirm("Are you sure you want to delete it?"))
		{
		return true;
		}
		else
		{
		return false;
		}
		});
		});
		
	</script>

	<script>

	$(document).ready( function () {
				$('#student_table').DataTable();
			} );
	</script>

@endsection