<?php

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
            'wishlist_id' => $wishlist->id
        ];

        $response = $this->actingAs(User::factory()->create())
            ->post(route('items.create', $wishlist), $startingItemDetails);

        $response->assertOk();

        $endingItemDetails = array_merge($startingItemDetails, [
            'price' => 4999
        ]);

        $this->assertDatabaseHas('items', $endingItemDetails);
    });
});
