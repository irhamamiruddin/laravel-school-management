@extends('students.layout')
@section('content')
 
<div class="card">
	<div class="card-header">Students Page</div>
	<div class="card-body">
      
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		<form action="{{ url('student') }}" method="post">
			{!! csrf_field() !!}
			<label>Name</label></br>
			<input type="text" name="name" id="name" class="form-control"></br>
			<label>Address</label></br>
			<input type="text" name="address" id="address" class="form-control"></br>
			<label>Mobile</label></br>
			<input type="text" name="mobile" id="mobile" class="form-control"></br>
			<input type="submit" value="Save" class="btn btn-success"></br>
		</form>
   
	</div>
</div>
 
@stop