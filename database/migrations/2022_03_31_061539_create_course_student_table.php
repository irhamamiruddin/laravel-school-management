<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('student_id');
			$table->bigInteger('course_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
