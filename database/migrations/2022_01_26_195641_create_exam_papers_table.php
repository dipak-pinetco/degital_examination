<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_papers', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('examination_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('class_teacher_subject_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('exam_papers');
    }
}
