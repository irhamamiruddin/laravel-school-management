<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use App\Models\Student;

class StudentController extends Controller
{
  
    public function index(Request $request)
    {
        $items = $request->input('items', 5);
        $trashed = $request->input('trashed', 0);
        $status = $request->input('status');
        $search = $request->input('search');

        $student = Student::query();

        // Condition to show trashed
        if($trashed == 1)
            $student = Student::withTrashed();
            
        // Search
        if($search != NULL){
                $student = $student->search($search);
        }

        // Condition for status
        if($status == "active"){
            $student = $student->active();
        }
        else if($status == "inactive"){
            $student = $student->inactive();
        }

        $student = $student->paginate($items)->appends($request->except('page'));

		return view('students.index')
			->with(['students'=>$student,'items'=>$items,'status'=>$status,'trashed'=>$trashed, 'search'=>$search]);
		
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
        $student = Student::withTrashed()->find($id);
		return view('students.show')->with('students',$student);
    }

    
    public function edit($id)
    {
       $student = Student::withTrashed()->find($id);
	   return view('students.edit')->with('students',$student);
    }
    
    
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|min:12',
			'address' => 'required|min:20',
			'mobile' => 'required|numeric|min:12',
		]);
		
		$student = Student::withTrashed()->find($id);
		$input = $request->all();
		$student->update($input);

        Artisan::call('command:refresh', ['id' => $id, '--model' => 'student']);
		
        return redirect('student')->with('flash_message','Student Updated!');
    }

    
    public function destroy($id)
    {
        Student::destroy($id);
		return redirect('student')->with('flash_message','Student Deleted!');
    }
	
	
	public function restore($id)
	{
		$student = Student::withTrashed()->find($id)->restore();
		return redirect('student')->with('flash_message','Student Restored!');
	}

}
