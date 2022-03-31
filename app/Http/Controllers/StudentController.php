<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
  
    public function index(Request $request)
    {
        $items = $request->items ?? 5;
		$student = Student::withTrashed()->paginate($items);

		return view('students.index')
			->with(['students'=>$student,'items'=>$items]);
		
    }

    
    public function create()
    {
        return view('students.create');
    }

    
    public function store(Request $request)
    {
		$validator = $request->validate([
			'name' => 'required|unique:students|min:12',
			'address' => 'required|min:20',
			'mobile' => 'required|unique:students|numeric|min:12',
		]);
		
		$input = $request->all();
		Student::create($input);
		return redirect('student')->with('flash_message','Student Added!');
			
    }

    
    public function show($id)
    {
        $student = Student::find($id);
		return view('students.show')->with('students',$student);
    }

    
    public function edit($id)
    {
       $student = Student::find($id);
	   return view('students.edit')->with('students',$student);
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
			'name' => 'required|unique:students|min:12',
			'address' => 'required|min:20',
			'mobile' => 'required|unique:students|numeric|min:12',
		]);
		
		$student = Student::find($id);
		$input = $request->all();
		$student->update($input);
		return redirect('student')->with('flash_message','Student Updated!');

    }

    
    public function destroy($id)
    {
        Student::destroy($id);
		return redirect('student')->with('flash_message','Student Deleted!');
    }
	
	
	public function restore($id)
	{
		Student::withTrashed()->restore($id);
		return redirect('student')->with('flash_message','Student Restored!');
	}
}
