<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
				<div class="card">
					<div class="card-body">
						<div class="card-body">
							<h5 class="card-title">Course Code : {{ $course->unit_code }}</h5></br>
							<p class="card-text">Course Name : {{ $course->unit_title }}</p>
							<p class="card-text">Program Name : {{ $course->program->program_name }}</p>
						</div>
						   
						</hr>
					  
					</div>
				</div>

			</div>
        </div>
    </div>
</x-app-layout>