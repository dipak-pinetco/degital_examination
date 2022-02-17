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
            $table->id('id');
            $table->foreignId('examination_group_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('academic_year_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('supervision_teacher_id')->nullable()->constrained('teachers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->morphs('examinationable');
            $table->string('name', 100)->nullable();
            $table->datetime('start_date_time')->nullable();
            $table->integer('total_time');
            $table->integer('total_marks');
            $table->integer('passout_marks');
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
