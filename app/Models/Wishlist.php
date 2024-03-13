<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wishlist extends Model
{
    use HasFactory, HasUlids;

    public function lastUpdated()
    {
        return $this->items->max('created_at');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function owners(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->users->pluck('firstname')->join(', ', ' and '))
        );
    }

    public function isPublic(): bool
    {
        return ! $this->private;
    }

    public function isVisibleTo(User $user): bool
    {
        if ($this->isPublic())
            return true;

        return $user->owns($this);
    }
}
