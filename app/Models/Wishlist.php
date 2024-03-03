<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory, HasUlids;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
