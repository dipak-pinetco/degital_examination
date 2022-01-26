<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassDivisionTeacherSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_division_teacher_subjects', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('class_division_id')->unsigned();
			$table->integer('class_teacher_subject_id')->unsigned();
			$table->timestamps();
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
        Schema::dropIfExists('class_division_teachers_subjects');
    }
}
