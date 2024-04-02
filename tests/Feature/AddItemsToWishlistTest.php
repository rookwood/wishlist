<?php

use App\Models\Item;
use App\Models\User;
use App\Models\Wishlist;

describe('Wishlist item management', function () {
    test('Items can be added to a wishlist', function () {
        $this->withoutExceptionHandling();
        $wishlist = Wishlist::factory()->create();

        $startingItemDetails = [
            'name' => 'Test item',
            'url' => 'https://example.com/products/1234',
            'price' => '$49.99',
            'quantity' => 1,
            'notes' => 'XXL, pastel black',
            'wishlist_id' => $wishlist->id,
        ];

        $response = $this->actingAs(User::factory()->create())
            ->post(route('items.create', $wishlist), $startingItemDetails);

        $response->assertOk();

        $endingItemDetails = array_merge($startingItemDetails, [
            'price' => 4999,
        ]);

        $this->assertDatabaseHas('items', $endingItemDetails);
    });

    test('Items can be removed from a wishlist', function () {
        $wishlist = Wishlist::factory()
            ->has(Item::factory())
            ->has(User::factory())
            ->create();
        $item = Item::first();

        $response = $this->actingAs($wishlist->users->first())
            ->post(route('items.delete', $item));

        $this->assertEquals(0, $wishlist->fresh()->items->count());
    });
});
