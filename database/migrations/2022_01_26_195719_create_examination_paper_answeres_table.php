<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationPaperAnsweresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_paper_answeres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('examination_paper_question_id')->unsigned();
            $table->integer('student_class_examination_id')->unsigned();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->string('teacher_nots', 191)->nullable();
            $table->longText('answere');
            $table->integer('examination_paper_question_option_id')->unsigned()->nullable();
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
        Schema::dropIfExists('examination_paper_answeres');
    }
}
