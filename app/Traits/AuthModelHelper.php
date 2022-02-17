<?php

namespace App\Traits;

use App\Models\School;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Storage;

trait AuthModelHelper
{
    /**
     * Get the school that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     */
    public function scopeRoleUser($query, array $roles)
    {
        $query->with(['roles'])
            ->when(!auth()->user()->hasRole('superAdmin'), function ($query) {
                $query->whereHas('school', function ($query) {
                    $query->where('id', auth()->user()->school_id);
                });
            });

        foreach ($roles as $key => $role) {
            $query->whereHas('roles', function ($q) use ($role) {
                $q->where('name', $role);
            });
        }
    }

    public function getAvatarPathAttribute()
    {
        return is_null($this->avatar) ? 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp&f=y' : Storage::url($this->avatar);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case '1':
                return 'Active';
                break;
            case '0':
                return 'Block';
                break;
            case '2':
                return 'Draft';
                break;
        }
    }
}
