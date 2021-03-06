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
            $table->id('id');
            $table->foreignId('class_division_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('class_teacher_subject_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_division_teacher_subjects');
    }
}
