<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
				<div class="card">
					<div class="card-header">Update Program</div>
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

						<form action="{{ url('program/' .$programs->id) }}" method="post">
							{!! csrf_field() !!}
							@method("PATCH")
							<input type="hidden" name="id" id="id" value="{{$programs->id}}" id="id" />
							<label>Program Code</label></br>
							<input type="text" name="program_code" id="program_code" value="{{ old('program_code',$programs->program_code) }}" class="form-control"></br>
							<label>Program Name</label></br>
							<input type="text" name="program_name" id="program_name" value="{{ old('program_name',$programs->program_name) }}" class="form-control"></br>
							<label>Program Level</label></br>
							<select name="program_level" id="program_level" class="form-control text-capitalize">
								<option value="{{ old('program_level',$programs->program_level) }}" hidden>{{ old('program_level',$programs->program_level) }}</option>
								<option value='foundation'>Foundation</option>
								<option value='diploma'>Diploma</option>
								<option value='degree'>Degree</option>
							</select></br>
							<input type="submit" value="Update" class="btn btn-success"></br>
						</form>
				   
					</div>
				</div>
				
			</div>
        </div>
    </div>
</x-app-layout>