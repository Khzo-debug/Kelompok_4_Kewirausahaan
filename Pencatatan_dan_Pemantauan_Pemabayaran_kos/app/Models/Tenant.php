<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    protected $fillable = ['room_id', 'name', 'phone_number', 'entry_date', 'status'];

    public function room(): BelongsTo
    {
        return $this->belongsTo('App\\Models\\Room');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
