<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserPreference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'source_id',
    ];

    /**
     * Get the user that has the user preferences.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function newsSource(): HasOne
    {
        return $this->hasOne(NewsSource::class, 'id', 'source_id');
    }
}
