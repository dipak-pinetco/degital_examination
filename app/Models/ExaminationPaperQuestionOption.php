<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaperQuestionOption extends Model
{
    use HasFactory, SoftDeletes;

    // /**
    //  * Get the examination_paper_question that owns the ExaminationPaperQuestionOption
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function examination_paper_question(): BelongsTo
    // {
    //     return $this->belongsTo(ExaminationPaperQuestion::class);
    // }


}
