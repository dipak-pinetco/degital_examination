<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassDivision extends Model
{
    use HasFactory, SoftDeletes;

    const CLASS_DIVISIONS_START = 'A';
    const CLASS_DIVISIONS_END = 'I';
    const CLASS_DIVISIONS_RENGE = ClassDivision::CLASS_DIVISIONS_START . '-' . ClassDivision::CLASS_DIVISIONS_END;

    const PAGINATION_COUNT = 10;

    public static function class_divisions_array()
    {
        return range('A', 'I');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class_id',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Get the class that owns the ClassDivision
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(Clases::class);
    }
}
