<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPaperQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_paper_question_options', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('exam_paper_question_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('value', 150);
            $table->boolean('is_right')->default(0);
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
        Schema::dropIfExists('exam_paper_question_options');
    }
}
