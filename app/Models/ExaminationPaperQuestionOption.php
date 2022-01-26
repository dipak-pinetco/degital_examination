<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaperQuestionOption extends Model
{
    use HasFactory, SoftDeletes;

    public function examination_paper_question()
    {
        return $this->belongsTo(ExaminationPaperQuestion::class);
    }
}
