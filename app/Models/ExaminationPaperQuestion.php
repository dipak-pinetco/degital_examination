<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaperQuestion extends Model
{
    use HasFactory, SoftDeletes;

    public function examination_paper()
    {
        return $this->belongsTo(ExaminationPaper::class);
    }
}
