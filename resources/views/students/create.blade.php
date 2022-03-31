<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
				<div class="card">
					<div class="card-header">Add New Student</div>
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
							<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"></br>
							<label>Address</label></br>
							<input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control"></br>
							<label>Mobile</label></br>
							<input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form-control"></br>
							<input type="submit" value="Save" class="btn btn-success"></br>
						</form>
				   
					</div>
				</div>
			</div>
        </div>
    </div>
</x-app-layout>