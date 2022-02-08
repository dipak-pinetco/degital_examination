<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPaperQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_paper_questions', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('exam_paper_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('question_type', array('text', 'radio', 'checkbox', 'number', 'boolean'));
            $table->string('question', 191);
            $table->integer('marks');
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
        Schema::dropIfExists('exam_paper_questions');
    }
}
