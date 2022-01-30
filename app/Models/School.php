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
     * Get all of the comments for the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academic_year(): HasMany
    {
        return $this->hasMany(AcademicYear::class);
    }

    /**
     * Get the examination_group that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examination_group(): HasMany
    {
        return $this->hasMany(ExaminationGroup::class);
    }

    /**
     * Get all of the class for the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function class(): HasMany
    {
        return $this->hasMany(Clases::class);
    }
}
