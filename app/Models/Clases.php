<?php

namespace App\Models;

use App\Relations\HasManySyncable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clases extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    const PAGINATION_COUNT = 10;

    protected $softCascade = ['divisions'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Overrides the default Eloquent hasMany relationship to return a HasManySyncable.
     *
     * {@inheritDoc}
     */
    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        $instance = $this->newRelatedInstance($related);

        $foreignKey = $foreignKey ?: $this->getForeignKey();

        $localKey = $localKey ?: $this->getKeyName();

        return new HasManySyncable(
            $instance->newQuery(),
            $this,
            $instance->getTable() . '.' . $foreignKey,
            $localKey
        );
    }

    /**
     * Get the school that owns the Clases
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get all of the divisions for the Clases
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisions(): HasMany
    {
        return $this->hasMany(ClassDivision::class);
    }

    /**
     * The subjects that belong to the Clases
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }

    public function examinations()
    {
        return $this->morphMany(Examination::class, 'examinationable');
    }
}
