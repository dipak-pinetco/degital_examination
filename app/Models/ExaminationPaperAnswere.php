<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaperAnswere extends Model
{
    use HasFactory, SoftDeletes;

    public function examination_paper_question()
    {
        return $this->belongsTo(ExaminationPaperQuestion::class);
    }

    public function student_class_examination()
    {
        return $this->belongsTo(StudentClassExamination::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function examination_paper_question_option()
    {
        return $this->belongsTo(ExaminationPaperQuestionOption::class);
    }
}
