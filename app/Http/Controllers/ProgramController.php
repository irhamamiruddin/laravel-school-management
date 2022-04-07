<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use App\Models\Program;

class ProgramController extends Controller
{
	
	
    public function index(Request $request)
    {
        $items = $request->input('items', 5);
		$program = Program::withTrashed()->paginate($items);

		return view('programs.index')
			->with(['programs'=>$program,'items'=>$items]);
    }

    
    public function create()
    {
        return view('programs.create');
    }

    
    public function store(Request $request)
    {
		$validator = $request->validate([
			'program_code' => 'required|unique:program|min:5',
			'program_name' => 'required|unique:program',
			'program_level' => 'required',
		]);
		
        $input = $request->all();
		Program::create($input);
		return redirect('program')->with('flash_message','New Program Added!');
    }

    
    public function show($id)
    {
        $program = Program::find($id);
		return view('programs.show')->with('programs',$program);
    }


    public function edit($id)
    {
        $program = Program::withTrashed()->find($id);
		return view('programs.edit')->with('programs',$program);
    }

    
    public function update(Request $request, $id)
    {		
		$validator = $request->validate([
			'program_code' => 'required|min:5',
			'program_name' => 'required',
			'program_level' => 'required',
		]);

        $program = Program::withTrashed()->find($id);
		$input = $request->all();
		$program->update($input);

        Artisan::call('command:refresh', ['id' => $id, '--model' => 'program']);

		return redirect('program')->with('flash_message','Program Updated!');
    }

    
    public function destroy($id)
    {
        Program::destroy($id);
		return redirect('program')->with('flash_message','Program Deleted!');
    }
	
	
	public function restore($id)
	{
		Program::withTrashed()->find($id)->restore();
		return redirect('program')->with('flash_message','Program Restored!');
	}
}
