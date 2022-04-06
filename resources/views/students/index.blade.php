<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">

							<!-- Add button -->
							<a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Student">
								<i class="fa fa-plus" aria-hidden="true"></i> Add New
							</a>

							<!-- Select items per page -->
							<div class="form-group pd2 clearmargin  col-lg-1 col-md-1 col-sm-1 col-xs-12 mt-3">
								<select name='items' id='pagination' onchange="submit()" class="form-control form-select-sm">
									<option value='5' @if($items==5) selected @endif>5</option>
									<option value='10' @if($items==10) selected @endif>10</option>
									<option value='25' @if($items==25) selected @endif>25</option>
									<option value='50' @if($items==50) selected @endif>50</option>
								</select>
							</div> 

							<!-- Toggle Trashed -->
							<div class="form-check form-switch mt-3">
								<input class="form-check-input" type="checkbox" role="switch" name="trash" id="trash" value="1" onchange="submit()" @if($trashed==1) checked @endif>
								<label class="form-check-label" for="trash">Show Trashed</label>
							</div>

							<!-- Select Status -->
							<div class="mt-3">
								<select name='status' id='status' onchange="submit()" class="form-control form-select-md">
									<option value='' hidden>Select Status</option>
									<option value='all' @if($status=="all") selected @endif >All</option>
									<option value='active' @if($status=="active") selected @endif>Active</option>
									<option value='inactive' @if($status=="inactive") selected @endif>Inactive</option>
								</select>
							</div>
							
							<!-- Search function -->
							<div class="input-group mt-3">
								<input type="text" class="form-control" placeholder="Search" name="search" id="search" @if($search!=null) value="{{ $search }}" @endif aria-label="Search">
								<button class="btn btn-outline-secondary" onclick="reset()">
									<i class="fa fa-times" aria-hidden="true"></i>
								</button>
								<button class="btn btn-outline-secondary" onclick="submit()">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</div>

							<br/>
							
							<!-- Table -->
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Address</th>
											<th>Mobile</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									@foreach($students as $item)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $item->name }}</td>
											<td>{{ $item->address }}</td>
											<td>+60{{ $item->mobile }}</td>
											<td>
												@if($item->deleted_at == NULL)
													Active
												@else
													Inactive
												@endif
											</td>
	 
											<td>
												<a href="{{ url('/student/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
												<a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
	 
												@if($item->deleted_at == NULL)
													<form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
														{{ method_field('DELETE') }}
														{{ csrf_field() }}
														<button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
													</form>
												@else
													<form method="POST" action="{{ url('/student' . '/' . $item->id) . '/restore' }}" accept-charset="UTF-8" style="display:inline">
														<input type="hidden" name="id" value="{{ $item->id }}"/>
														{{ csrf_field() }}
														<button type="submit" class="btn btn-success btn-sm" title="Restore Student" onclick="return confirm(&quot;Confirm restore?&quot;)"><i class="fa fa-undo" aria-hidden="true"></i> Restore</button>
													</form>
												@endif
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							{{ $students->links() }}
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
	function submit(){
		var status = document.getElementById("status").value;
		var search = document.getElementById("search").value;
		var item = document.getElementById("pagination").value;
		var checkBox = document.getElementById("trash");
		if(checkBox.checked == true)
		{
			window.location = "{{ route('student.index', ['trashed' => 1]) }}"+ "&status=" + status + "&search=" + search + "&items=" + item;
		}
		else{
			window.location = "{{ route('student.index', ['trashed' => 0]) }}" + "&status=" + status + "&search=" + search + "&items=" + item;
		}
	};

	function reset(){
		return document.getElementById("search").value = null;
	}
</script>