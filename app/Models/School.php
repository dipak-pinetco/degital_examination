<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get all of the academicYears for the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academicYears(): HasMany
    {
        return $this->hasMany(AcademicYear::class);
    }

    /**
     * Get the examinationGroups that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examinationGroups(): HasMany
    {
        return $this->hasMany(ExaminationGroup::class);
    }

    /**
     * Get all of the clases for the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases(): HasMany
    {
        return $this->hasMany(Clases::class);
    }
}
