<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory, HasUlids;

    protected $with = ['purchases'];

    public function markPurchased(User $user, int $quantity = 1)
    {
        Purchase::create([
            'item_id' => $this->id,
            'user_id' => $user->id,
            'quantity' => $quantity
        ]);
    }

    public function quantityPurchased(): int
    {
        return $this->purchases->count();
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function stillneeds(): int
    {
        return $this->quantity - $this->quantityPurchased();
    }

    public function wishlist(): BelongsTo
    {
        return $this->belongsTo(Wishlist::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => sprintf('$%s', number_format($value / 100, 2))
        );
    }
}
