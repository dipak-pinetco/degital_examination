<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTeacherSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_teacher_subjects', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('class_subject_id')->constrained('clases_subject')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('subject_teacher_id')->constrained('subject_teacher')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_teacher_subjects');
    }
}
