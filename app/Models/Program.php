<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;
	
	protected $table = 'program';
	protected $primaryKey = 'id';
	protected $fillable = ['program_code','program_name','program_level'];
	
	public function course()
    {
        return $this->hasMany(Course::class);
    }
}
