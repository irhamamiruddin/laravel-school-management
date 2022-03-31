@extends('programs.layout')
@section('content')
 
 
<div class="card">
	<div class="card-header">Program</div>
	<div class="card-body">
		<div class="card-body">
		<h5 class="card-title">Program Code : {{ $programs->program_code }}</h5>
		<p class="card-text">Program Name : {{ $programs->program_name }}</p>
		<p class="card-text text-capitalize">Program Level : {{ $programs->program_level }}</p>
	</div>
       
    </hr>
  
	</div>
</div>