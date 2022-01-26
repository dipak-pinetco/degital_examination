<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('examination_group_id')->unsigned()->nullable();
			$table->integer('academic_year_id')->unsigned();
			$table->integer('examinationable_id');
			$table->string('examinationable_type', 100);
			$table->string('name', 100)->nullable();
			$table->datetime('start_datetime')->nullable();
			$table->integer('total_time');
			$table->integer('total_marks');
			$table->integer('passout_marks');
			$table->integer('supervision_teacher_id')->unsigned();
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
        Schema::dropIfExists('examinations');
    }
}
