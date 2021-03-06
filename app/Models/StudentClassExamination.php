<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClassExamination extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the studentClass that owns the StudentClassExamination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentClass(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class);
    }

    /**
     * Get the examination that owns the StudentClassExamination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examination(): BelongsTo
    {
        return $this->belongsTo(Examination::class);
    }
}
