<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClass extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the student that owns the StudentClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the classDivision that owns the StudentClass
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classDivision(): BelongsTo
    {
        return $this->belongsTo(ClassDivision::class);
    }
}
