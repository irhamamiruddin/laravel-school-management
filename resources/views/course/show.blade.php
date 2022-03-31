@extends('course.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Course</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Course Code : {{ $course->unit_code }}</h5>
        <p class="card-text">Course Name : {{ $course->unit_title }}</p>
        <p class="card-text">Program Name : {{ $course->program->program_name }}</p>
  </div>
       
    </hr>
  
  </div>
</div>