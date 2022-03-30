<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use SoftDeletes;
	
	//controller will send the student data to this model 
	protected $table = 'students';
	protected $primaryKey = 'id';
	protected $fillable = ['name','address','mobile'];
	
	public function course()
    {
        return $this->belongsToMany(Course::class,'student_course');
    }
	
	// protected function pascalCase():Attribute
	// {
		// return Attribute::make(
			// get: fn ($value) => ucfirst($value),
			// set: fn ($value) => strtolower($value),
		// );
	// }
	
	
	// protected function phoneNo():Attribute
	// {
		// return Attribute::make(
			// get: fn ($value) => ;
			// set: fn ($value) => ;
		// );
	// }
}
