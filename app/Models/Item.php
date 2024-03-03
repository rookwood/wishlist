<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, HasUlids;

    public function wishlist()
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
