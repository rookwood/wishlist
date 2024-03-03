<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wishlists = Wishlist::factory()
            ->times(10)
            ->has(Item::factory()->count(5))
            ->create();

        $users = User::all();

        $wishlists->each(function ($wishlist) use ($users) {
            $wishlist->users()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
