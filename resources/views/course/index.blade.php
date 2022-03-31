@extends('course.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Course</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/course/create') }}" class="btn btn-success btn-sm" title="Add New Course">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
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
                                            <a href="{{ url('/course/' . $item->id) }}" title="View Course"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/course/' . $item->id . '/edit') }}" title="Edit Course"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
											@if($item->deleted_at == NULL)
												<form method="POST" action="{{ url('/course' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
													{{ method_field('DELETE') }}
													{{ csrf_field() }}
													<button type="submit" class="btn btn-danger btn-sm" title="Delete Course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
												</form>
											@else
												<form method="POST" action="{{ url('/course' . '/' . $item->id) . '/restore' }}" accept-charset="UTF-8" style="display:inline">
													<input type="hidden" name=value="{{ $item->id }}"/>
													{{ csrf_field() }}
													<button type="submit" class="btn btn-success btn-sm" title="Restore Course" onclick="return confirm(&quot;Confirm restore?&quot;)"><i class="fa fa-undo" aria-hidden="true"></i> Restore</button>
												</form>
											@endif
                                        </td>
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
@endsection