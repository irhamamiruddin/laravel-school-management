<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
	
	protected $table = 'course';
	protected $primaryKey = 'id';
	protected $fillable = ['program_id','unit_code','unit_title'];
	
	// A course belongs to one program.
	public function program()
    {
        return $this->belongsTo(Program::class,'program_id');
    }
	
	public function student()
    {
        return $this->belongsToMany(Student::class,'student_course');
    }
}
