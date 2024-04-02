<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['name', 'private'];

    public static function createFromRequest($request): Wishlist
    {
        $wishlist = static::create([
            'name' => $request->name,
            'private' => $request->private,

        ]);

        $wishlist->users()->attach(Auth::user());

        return $wishlist;
    }

    public function lastUpdated(): string
    {
        return $this->items->max('created_at')
            ? $this->items->max('created_at')->toFormattedDateString()
            : $this->created_at->toFormattedDateString();
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
        if ($this->isPublic()) {
            return true;
        }

        return $user->owns($this);
    }
}
