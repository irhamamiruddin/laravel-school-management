<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<a href="{{ url('/course/create') }}" class="btn btn-success btn-sm" title="Add New Course">
								<i class="fa fa-plus" aria-hidden="true"></i> Add New
							</a>
							<div class="form-group pd2 clearmargin  col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-3">
								<form>
									<select name='items' id='pagination' class="form-control">
										<option value='5' @if($items==5) selected @endif>5</option>
										<option value='10' @if($items==10) selected @endif>10</option>
										<option value='25' @if($items==25) selected @endif>25</option>
										<option value='50' @if($items==50) selected @endif>50</option>
									</select>
								</form>
								<script>
									document.getElementById('pagination').onchange = function() { 
										window.location = "{!! $course->url(1) !!}&items=" + this.value; 
									};
								</script>
							</div>
							<br/>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Course Name</th>
											<th>Program Name</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									@foreach($course as $item)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $item->unit_code }}</td>
											<td>{{ $item->unit_title }}</td>
											<td>{{ $item->program->program_name }}</td>
											<td>
												@if($item->deleted_at == NULL)
													Active
												@else
													Inactive
												@endif
											</td>
	 
											<td>
												<a href="{{ url('/course/' . $item->id) }}" title="View Course"><button class="inline-block px-2.5 py-2 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
												<a href="{{ url('/course/' . $item->id . '/edit') }}" title="Edit Course"><button class="inline-block px-2.5 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
	 
												@if($item->deleted_at == NULL)
													<form method="POST" action="{{ url('/course' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
														{{ method_field('DELETE') }}
														{{ csrf_field() }}
														<button type="submit" class="binline-block px-2.5 py-2 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" title="Delete Course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
													</form>
												@else
													<form method="POST" action="{{ url('/course' . '/' . $item->id) . '/restore' }}" accept-charset="UTF-8" style="display:inline">
														<input type="hidden" name=value="{{ $item->id }}"/>
														{{ csrf_field() }}
														<button type="submit" class="inline-block px-2.5 py-2 bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-900 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-900 active:shadow-lg transition duration-150 ease-in-out" title="Restore Course" onclick="return confirm(&quot;Confirm restore?&quot;)"><i class="fa fa-undo" aria-hidden="true"></i> Restore</button>
													</form>
												@endif
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							{{ $course->links() }}
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</x-app-layout>