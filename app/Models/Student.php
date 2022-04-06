<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    use SoftDeletes;
	
	//controller will send the student data to this model 
	protected $table = 'students';
	protected $primaryKey = 'id';
	protected $fillable = ['name','address','mobile'];
	
	public function course()
    {
        return $this->belongsToMany(Course::class,'course_student');
	}


	protected function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  $value,
            set: fn ($value) =>  str_replace(' ', '', ucwords($value)),
        );
    }

	protected function mobile(): Attribute
    {
        return new Attribute(
			get: fn ($value) => trim($value,"+60"),
			set: fn ($value) => "+60".$value ,
        );
    }


    // query scope
	public function scopeActive($query)
    {
        return $query->where('deleted_at', '=', NULL);
    }

    public function scopeInactive($query)
    {
        return $query->where('deleted_at', '!=', NULL);
    }

    public function scopeSearch($query,$search)
    {
        return $query->where('name', 'LIKE', "%$search%");
    }
	
}
