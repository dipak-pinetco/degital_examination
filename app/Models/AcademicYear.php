<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the school that owns the AcademicYear
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function scopeSchoolCurrentYear($query)
    {
        $query->where('school_id', auth()->user()->school_id)->orderByDesc('id')->take(1);
    }
}
