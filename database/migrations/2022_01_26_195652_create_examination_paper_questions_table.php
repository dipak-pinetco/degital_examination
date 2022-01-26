<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationPaperQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_paper_questions', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('examination_paper_id')->unsigned();
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
        Schema::dropIfExists('examination_paper_questions');
    }
}
