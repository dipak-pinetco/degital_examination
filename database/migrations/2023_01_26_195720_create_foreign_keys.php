<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('clases', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('class_subjects', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('clases')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('class_subjects', function (Blueprint $table) {
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('class_divisions', function (Blueprint $table) {
            $table->foreign('class_id')->references('id')->on('clases')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->foreign('subject_id')->references('id')->on('subjects')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('class_teacher_subjects', function (Blueprint $table) {
            $table->foreign('class_subject_id')->references('id')->on('class_subjects')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('class_teacher_subjects', function (Blueprint $table) {
            $table->foreign('teacher_subject_id')->references('id')->on('teacher_subjects')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('class_division_teacher_subjects', function (Blueprint $table) {
            $table->foreign('class_division_id')->references('id')->on('class_divisions')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('class_division_teacher_subjects', function (Blueprint $table) {
            $table->foreign('class_teacher_subject_id')->references('id')->on('class_teacher_subjects')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examinations', function (Blueprint $table) {
            $table->foreign('examination_group_id')->references('id')->on('examination_groups')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examinations', function (Blueprint $table) {
            $table->foreign('academic_year_id')->references('id')->on('academic_years')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examinations', function (Blueprint $table) {
            $table->foreign('supervision_teacher_id')->references('id')->on('teachers')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('academic_years', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examination_groups', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examination_papers', function (Blueprint $table) {
            $table->foreign('examination_id')->references('id')->on('examinations')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examination_papers', function (Blueprint $table) {
            $table->foreign('class_teacher_subject_id')->references('id')->on('class_teacher_subjects')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examination_paper_questions', function (Blueprint $table) {
            $table->foreign('examination_paper_id')->references('id')->on('examination_papers')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        // Schema::table('examination_paper_question_options', function (Blueprint $table) {
        //     $table->foreign('examination_paper_question_id')->references('id')->on('examination_paper_questions')
        //         ->onDelete('cascade')
        //         ->onUpdate('no action');
        // });
        Schema::table('examination_paper_answeres', function (Blueprint $table) {
            $table->foreign('examination_paper_question_id')->references('id')->on('examination_paper_questions')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examination_paper_answeres', function (Blueprint $table) {
            $table->foreign('student_class_examination_id')->references('id')->on('student_class_examinations')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('examination_paper_answeres', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        // Schema::table('examination_paper_answeres', function (Blueprint $table) {
        //     $table->foreign('examination_paper_question_option_id')->references('id')->on('examination_paper_question_options')
        //         ->onDelete('cascade')
        //         ->onUpdate('no action');
        // });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('student_classes', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('student')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('student_classes', function (Blueprint $table) {
            $table->foreign('class_division_id')->references('id')->on('class_divisions')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('student_class_examinations', function (Blueprint $table) {
            $table->foreign('student_class_id')->references('id')->on('student_classes')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
        Schema::table('student_class_examinations', function (Blueprint $table) {
            $table->foreign('examination_id')->references('id')->on('examinations')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_school_id_foreign');
        });
        Schema::table('clases', function (Blueprint $table) {
            $table->dropForeign('clases_school_id_foreign');
        });
        Schema::table('class_subjects', function (Blueprint $table) {
            $table->dropForeign('class_subjects_class_id_foreign');
        });
        Schema::table('class_subjects', function (Blueprint $table) {
            $table->dropForeign('class_subjects_subject_id_foreign');
        });
        Schema::table('class_divisions', function (Blueprint $table) {
            $table->dropForeign('class_divisions_class_id_foreign');
        });
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign('teachers_school_id_foreign');
        });
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('teacher_subjects_teacher_id_foreign');
        });
        Schema::table('teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('teacher_subjects_subject_id_foreign');
        });
        Schema::table('class_teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('class_teacher_subjects_class_subject_id_foreign');
        });
        Schema::table('class_teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('class_teacher_subjects_teacher_subject_id_foreign');
        });
        Schema::table('class_division_teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('class_division_teacher_subjects_class_division_id_foreign');
        });
        Schema::table('class_division_teacher_subjects', function (Blueprint $table) {
            $table->dropForeign('class_division_teacher_subjects_class_teacher_subject_id_foreign');
        });
        Schema::table('examinations', function (Blueprint $table) {
            $table->dropForeign('examinations_examination_group_id_foreign');
        });
        Schema::table('examinations', function (Blueprint $table) {
            $table->dropForeign('examinations_academic_year_id_foreign');
        });
        Schema::table('examinations', function (Blueprint $table) {
            $table->dropForeign('examinations_supervision_teacher_id_foreign');
        });
        Schema::table('academic_years', function (Blueprint $table) {
            $table->dropForeign('academic_years_school_id_foreign');
        });
        Schema::table('examination_groups', function (Blueprint $table) {
            $table->dropForeign('examination_groups_school_id_foreign');
        });
        Schema::table('examination_papers', function (Blueprint $table) {
            $table->dropForeign('examination_papers_examination_id_foreign');
        });
        Schema::table('examination_papers', function (Blueprint $table) {
            $table->dropForeign('examination_papers_class_teacher_subject_id_foreign');
        });
        Schema::table('examination_paper_questions', function (Blueprint $table) {
            $table->dropForeign('examination_paper_questions_examination_paper_id_foreign');
        });
        // Schema::table('examination_paper_question_options', function (Blueprint $table) {
        //     $table->dropForeign('examination_paper_question_options_examination_paper_question_id_foreign');
        // });
        Schema::table('examination_paper_answeres', function (Blueprint $table) {
            $table->dropForeign('examination_paper_answeres_examination_paper_question_id_foreign');
        });
        Schema::table('examination_paper_answeres', function (Blueprint $table) {
            $table->dropForeign('examination_paper_answeres_student_class_examination_id_foreign');
        });
        Schema::table('examination_paper_answeres', function (Blueprint $table) {
            $table->dropForeign('examination_paper_answeres_teacher_id_foreign');
        });
        // Schema::table('examination_paper_answeres', function (Blueprint $table) {
        //     $table->dropForeign('examination_paper_answeres_examination_paper_question_option_id_foreign');
        // });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('student_user_id_foreign');
        });
        Schema::table('student_classes', function (Blueprint $table) {
            $table->dropForeign('student_classes_student_id_foreign');
        });
        Schema::table('student_classes', function (Blueprint $table) {
            $table->dropForeign('student_classes_class_division_id_foreign');
        });
        Schema::table('student_class_examinations', function (Blueprint $table) {
            $table->dropForeign('student_class_examinations_student_class_id_foreign');
        });
        Schema::table('student_class_examinations', function (Blueprint $table) {
            $table->dropForeign('student_class_examinations_examination_id_foreign');
        });
    }
}
