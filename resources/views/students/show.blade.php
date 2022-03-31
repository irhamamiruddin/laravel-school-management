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
					<div class="card-body">
						<div class="card-body">
							<h5 class="card-title">Name : {{ $students->name }}</h5></br>
							<p class="card-text">Address : {{ $students->address }}</p>
							<p class="card-text">Mobile : {{ $students->mobile }}</p>
						</div>					   
						</hr>				  
					</div>
				</div>
				
			</div>
        </div>
    </div>
</x-app-layout>