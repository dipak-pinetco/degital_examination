<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaperAnswere extends Model
{
    use HasFactory, SoftDeletes;

    // /**
    //  * Get the examination_paper_question that owns the ExaminationPaperAnswere
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function examination_paper_question(): BelongsTo
    // {
    //     return $this->belongsTo(ExaminationPaperQuestion::class);
    // }

    // /**
    //  * Get the student_class_examination that owns the ExaminationPaperAnswere
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function student_class_examination(): BelongsTo
    // {
    //     return $this->belongsTo(StudentClassExamination::class);
    // }

    // /**
    //  * Get the teacher that owns the ExaminationPaperAnswere
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function teacher(): BelongsTo
    // {
    //     return $this->belongsTo(Teacher::class);
    // }

    // /**
    //  * Get the examination_paper_question_option that owns the ExaminationPaperAnswere
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function examination_paper_question_option(): BelongsTo
    // {
    //     return $this->belongsTo(ExaminationPaperQuestionOption::class);
    // }
}
