<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wishlist::factory()
            ->times(5)
            ->has(Item::factory()->count(5))
            ->create();
    }
}
