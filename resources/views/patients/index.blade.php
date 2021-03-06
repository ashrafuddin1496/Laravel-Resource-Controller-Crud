<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
</head>
<body>



	<div class="wrap-table ">
        <a class="btn btn-sm btn-primary" href="{{route('patients.create')}}">Add Patient</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Uname</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

                    @foreach($patients as $patient)
						<tr>
							<td>1</td>
							<td>{{$patient -> name}}</td>
							<td>{{$patient -> email}}</td>
							<td>{{$patient -> cell}}</td>
							<td>{{$patient -> username}}</td>
							<td><img src="{{$patient -> photo}}" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="#">View</a>
								<a class="btn btn-sm btn-warning" href="{{route('patients.edit',$patient ->id)}}">Edit</a>

                                <form style="display: inline" action="{{route('patients.destroy', $patient ->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>

							</td>
						</tr>
                    @endforeach


					</tbody>
				</table>
			</div>
		</div>
	</div>








	<!-- JS FILES  -->
	<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{'assets/js/bootstrap.min.js'}}"></script>
	<script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
