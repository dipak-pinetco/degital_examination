<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_papers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('examination_id')->unsigned();
			$table->integer('class_teacher_subject_id')->unsigned();
			$table->string('name', 50);
			$table->boolean('is_select')->default(0);
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
        Schema::dropIfExists('examination_papers');
    }
}
