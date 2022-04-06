<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Program;

class CourseController extends Controller
{
	
	
    public function index(Request $request)
    {
        $items = $request->input('items', 5);
        $course = Course::withTrashed()->paginate($items);

        return view('course.index')
          ->with(['course'=>$course,'items'=>$items]);
    }

    
    public function create()
    {
		    $program = Program::get();
        return view('course.create')->with('programs',$program);
    }

    
    public function store(Request $request)
    {
		$validator = $request->validate([
			'unit_code' => 'required|unique:course|min:6',
			'unit_title' => 'required|unique:course',
			'program_id' => 'required',
		]);
		
        $input = $request->all();
		Course::create($input);
		return redirect('course')->with('flash_message','New Course Added!');
    }

    
    public function show($id)
    {
        $course = Course::find($id);
		return view('course.show')->with('course',$course);
    }


    public function edit($id)
    {
        $course = Course::find($id);
		$program = Program::get();
		return view('course.edit')->with(['course'=>$course,'programs'=>$program]);
    }

    
    public function update(Request $request, $id)
    {		
		$validator = $request->validate([
			'unit_code' => 'required|unique:course|min:6',
			'unit_title' => 'required|unique:course',
			'program_id' => 'required',
		]);
		
        $input = $request->all();
		$course = Course::find($id);
		$course = update($input);
		return redirect('course')->with('flash_message','Course Updated!');
    }

    
    public function destroy($id)
    {
        Course::destroy($id);
		return redirect('course')->with('flash_message','Course Deleted!');
    }
	
	
	public function restore($id)
	{
		Course::withTrashed()->find($id)->restore();
		return redirect('course')->with('flash_message','Course Restored!');
	}
}
