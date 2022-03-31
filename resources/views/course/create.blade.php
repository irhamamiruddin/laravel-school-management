@extends('course.layout')
@section('content')
 
<div class="card">
	<div class="card-header">Add New Course</div>
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
		
		<form action="{{ url('course') }}" method="post">
			{!! csrf_field() !!}
			<label>Course Code</label></br>
			<input type="text" name="unit_code" id="unit_code"  value="{{ old('unit_code') }}" class="form-control"></br>
			<label>Course Name</label></br>
			<input type="text" name="unit_title" id="unit_title"  value="{{ old('unit_title') }}"class="form-control"></br>
			<label>Program</label></br>
			<select name="program_id" id="program_id" class="form-control">
				<option value="" hidden></option>
				@foreach($programs as $item)
					<option value="{{ $item->id }}">{{ $item->program_name }}</option>
				@endforeach
			</select></br>
			<input type="submit" value="Save" class="btn btn-success"></br>
		</form>
   
	</div>
</div>
 
@stop