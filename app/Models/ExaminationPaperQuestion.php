<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaperQuestion extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the examination_paper that owns the ExaminationPaperQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examination_paper(): BelongsTo
    {
        return $this->belongsTo(ExaminationPaper::class);
    }

}
