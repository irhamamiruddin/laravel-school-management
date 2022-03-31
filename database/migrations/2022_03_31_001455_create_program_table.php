<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->id();
			$table->string('program_code');
			$table->text('program_name');
			$table-enum('program_level',['foundation','diploma','degree']);
            $table->timestamps();
        });
		
		
		Schema::table('program', function(Blueprint $table) {
			$table->softDeletes();
		});
		
		
		Schema::create('course', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('program_id');
			$table->string('unit_code');
			$table->text('unit_title');
            $table->timestamps();
        });
		
		
		Schema::table('course', function(Blueprint $table) {
			$table->softDeletes();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
		
		Schema::table('program',function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		
		Schema::table('course',function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
    }
}
