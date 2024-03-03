<?php

use App\Models\Item;
use App\Models\User;
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
            $response->assertSee($item->quantity);
            $response->assertSee($item->notes);
        });
    });

    test('Each list can belong to multiple users', function () {
        $wishlist = Wishlist::factory()
            ->has(User::factory()->count(2))
            ->create();

        expect(count($wishlist->users))->toBe(2);
        expect($wishlist->owners)->toContain(User::first()->firstname);
    });
});
