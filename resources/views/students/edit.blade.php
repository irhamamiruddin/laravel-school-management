@extends('students.layout')
@section('content')
 
<div class="card">
	<div class="card-header">Update Page</div>
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

		<form action="{{ url('student/' .$students->id) }}" method="post">
			{!! csrf_field() !!}
			@method("PATCH")
			<input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
			<label>Name</label></br>
			<input type="text" name="name" id="name" value="{{ old('name',$students->name) }}" class="form-control"></br>
			<label>Address</label></br>
			<input type="text" name="address" id="address" value="{{ old('address',$students->address) }}" class="form-control"></br>
			<label>Mobile</label></br>
			<input type="text" name="mobile" id="mobile" value="{{ old('mobile',$students->mobile) }}" class="form-control"></br>
			<input type="submit" value="Update" class="btn btn-success"></br>
		</form>
   
	</div>
</div>
 
@stop