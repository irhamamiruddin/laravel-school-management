<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\Program;
use App\Models\Course;
use Validator;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:refresh {id} {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh all records of programs and courses so that the updated_at date time is updated.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $model = $this->option('model');

        $validator = Validator::make(['id'=>$id,'model'=>$model], ['id'=>'required|numerical','model'=>'required|string']);

        if($model == 'student')
            $update = Student::find($id);
        else if($model == 'program')
            $update = Program::find($id);
        else        
            $update = Course::find($id);

        return $update->touch();
    }
}
