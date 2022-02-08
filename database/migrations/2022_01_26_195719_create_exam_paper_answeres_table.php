<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPaperAnsweresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_paper_answeres', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('exam_paper_question_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('student_class_examination_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('teacher_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('exam_paper_question_option_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('teacher_nots', 191)->nullable();
            $table->longText('answere');
            $table->integer('obtain_mark')->nullable();
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
        Schema::dropIfExists('exam_paper_answeres');
    }
}
