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
					<div class="card-body">
						<div class="card-body">
							<h5 class="card-title">Program Code : {{ $programs->program_code }}</h5><hr>
							<p class="card-text">Program Name : {{ $programs->program_name }}</p>
							<p class="card-text text-capitalize">Program Level : {{ $programs->program_level }}</p>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Course</th>
									</tr>
								</thead>
								<tbody>
									@foreach($programs->course as $course)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $course->unit_title }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</x-app-layout>