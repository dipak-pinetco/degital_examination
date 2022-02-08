<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_class_examinations', function (Blueprint $table) {
            $table->id('id');
			$table->foreignId('student_class_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
			$table->foreignId('examination_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
			$table->boolean('student_present')->default(0);
			$table->enum('paper_check_status', array('pending', 'check', 'copycase'));
			$table->mediumText('teachers_nots')->nullable();
			$table->integer('total_obtain_marks')->nullable();
			$table->boolean('result')->nullable();
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
        Schema::dropIfExists('student_class_examinations');
    }
}
