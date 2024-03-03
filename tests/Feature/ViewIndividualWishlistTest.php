<?php

use App\Models\Item;
use App\Models\Wishlist;

describe('Viewing an individual wishlist', function () {
    test('Each list can have items', function() {
        $wishlist = Wishlist::factory()
            ->has(Item::factory()->count(3))
            ->create();

        expect($wishlist->items)->not->toBeEmpty();

        $response = $this->get(route('wishlist.show', $wishlist->id));

        $response->assertOk();

        $response->assertSee($wishlist->name);
        $wishlist->items->each(function ($item) use ($response) {
            $response->assertSee($item->name);
            $response->assertSee($item->url);
            $response->assertSee($item->price);
        });
    });
});
